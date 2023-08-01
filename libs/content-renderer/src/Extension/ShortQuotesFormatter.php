<?php

declare(strict_types=1);

namespace Local\ContentRenderer\Extension;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Event\DocumentPreParsedEvent;
use League\CommonMark\Extension\ExtensionInterface;
use League\CommonMark\Input\MarkdownInput;

final class ShortQuotesFormatter implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addEventListener(DocumentPreParsedEvent::class, $this, -50);
    }

    public function __invoke(DocumentPreParsedEvent $e): void
    {
        $md = $e->getMarkdown();

        $content = $md->getContent();

        $content = \preg_replace('/^!>\h/um', '> {note} ', $content);
        $content = \preg_replace('/^\?>\h/um', '> {tip} ', $content);

        $e->replaceMarkdown(new MarkdownInput($content));
    }
}
