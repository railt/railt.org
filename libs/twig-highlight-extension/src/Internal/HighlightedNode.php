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
    public function __construct(
        private readonly Highlighter $hl,
        string $lang,
        Node $body,
        int $line,
        string $tag = 'highlight'
    ) {
        parent::__construct(['body' => $body], ['lang' => $lang], $line, $tag);
    }

    /**
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
