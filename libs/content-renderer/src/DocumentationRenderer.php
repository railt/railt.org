<?php

declare(strict_types=1);

namespace Local\ContentRenderer;

use Highlight\Highlighter;
use Local\ContentRenderer\Extension\ImportHeaderClasses;
use Local\ContentRenderer\Extension\NormalizeAnchors;
use Local\ContentRenderer\Extension\QuotesFormatter;
use Local\ContentRenderer\Extension\RemoveEmptyParagraphs;
use Local\ContentRenderer\Extension\RemoveStyleTags;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;
use League\CommonMark\Util\HtmlFilter;
use Local\ContentRenderer\Extension\ShortQuotesFormatter;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;
use Symfony\Component\String\Slugger\AsciiSlugger;
use Symfony\Component\String\Slugger\SluggerInterface;

class DocumentationRenderer extends Renderer
{
    public function __construct(
        Highlighter $highlighter,
        SluggerInterface $slugger = new AsciiSlugger(),
    ) {
        parent::__construct([
            'html_input' => HtmlFilter::ALLOW,
        ]);

        $this->env->addExtension(new ImportHeaderClasses($slugger));
        $this->env->addExtension(new ShortQuotesFormatter());
        $this->env->addExtension(new QuotesFormatter());
        $this->env->addExtension(new RemoveEmptyParagraphs());
        $this->env->addExtension(new NormalizeAnchors());
        $this->env->addExtension(new RemoveStyleTags());

        $this->env->addRenderer(FencedCode::class, $this->getFencedCodeRenderer($highlighter));
        $this->env->addRenderer(IndentedCode::class, $this->getIndentedCodeRenderer($highlighter));
    }

    private function getFencedCodeRenderer(Highlighter $hl): FencedCodeRenderer
    {
        $renderer = new FencedCodeRenderer();

        $highlighter = (new \ReflectionObject($renderer))
            ->getProperty('highlighter')
            ->getValue($renderer);

        (new \ReflectionObject($highlighter))
            ->getProperty('highlighter')
            ->setValue($hl, $highlighter);

        return $renderer;
    }

    private function getIndentedCodeRenderer(Highlighter $hl): IndentedCodeRenderer
    {
        $renderer = new IndentedCodeRenderer();

        $highlighter = (new \ReflectionObject($renderer))
            ->getProperty('highlighter')
            ->getValue($renderer);

        (new \ReflectionObject($highlighter))
            ->getProperty('highlighter')
            ->setValue($hl, $highlighter);

        return $renderer;
    }
}
