<?php

declare(strict_types=1);

namespace Local\ContentRenderer;

use League\CommonMark\Environment\Environment;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use League\CommonMark\Util\HtmlFilter;

abstract class Renderer implements ContentRendererInterface
{
    /**
     * @var array<non-empty-string, mixed>
     */
    private const DEFAULT_CONFIG = [
        'html_input' => HtmlFilter::ESCAPE,
        'allow_unsafe_links' => false,
    ];

    /**
     * @var GithubFlavoredMarkdownConverter
     */
    protected readonly GithubFlavoredMarkdownConverter $converter;

    /**
     * @var Environment
     */
    protected readonly Environment $env;

    /**
     * @param array<non-empty-string, mixed> $config
     */
    public function __construct(array $config = [])
    {
        $this->converter = new GithubFlavoredMarkdownConverter([
            ...self::DEFAULT_CONFIG,
            ...$config,
        ]);

        $this->env = $this->converter->getEnvironment();
    }

    public function render(string $markdown): string
    {
        $result = $this->converter->convert($markdown);

        return $result->getContent();
    }
}
