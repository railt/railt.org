<?php

declare(strict_types=1);

namespace App\Twig\HighlightExtension\Internal;

use Highlight\Highlighter;
use Twig\Compiler;
use Twig\Node\Node;
use Twig\Node\TextNode;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal App\Twig\HighlightExtension
 */
final class HighlightedNode extends Node
{
    /**
     * @param Highlighter $hl
     * @param string $lang
     * @param Node $body
     * @param int $line
     * @param string $tag
     */
    public function __construct(
        private readonly Highlighter $hl,
        string $lang,
        Node $body,
        int $line,
        string $tag = 'highlight'
    )
    {
        parent::__construct(['body' => $body], ['lang' => $lang], $line, $tag);
    }

    /**
     * @param Compiler $compiler
     * @throws \Exception
     */
    public function compile(Compiler $compiler): void
    {
        $body = $this->getNode('body');

        if ($body instanceof TextNode) {
            $body->setAttribute('data',
                $this->render(
                    $this->getAttribute('lang'),
                    $body->getAttribute('data')
                )
            );

            $compiler->subcompile($body);
        }
    }

    /**
     * @param string $lang
     * @param string $code
     * @return string
     * @throws \Exception
     */
    private function render(string $lang, string $code): string
    {
        $highlighted = $this->hl->highlight($lang, $code);

        return '<code data-language="' . $highlighted->language . '">' .
            \trim($highlighted->value) .
        '</code>';
    }
}
