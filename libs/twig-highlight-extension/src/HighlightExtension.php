<?php

declare(strict_types=1);

namespace App\Twig\HighlightExtension;

use App\Twig\HighlightExtension\Internal\HighlightTokenParser;
use Highlight\Highlighter;
use Twig\Extension\AbstractExtension;

final class HighlightExtension extends AbstractExtension
{
    /**
     * @param Highlighter $hl
     */
    public function __construct(
        private readonly Highlighter $hl
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getTokenParsers(): array
    {
        return [new HighlightTokenParser($this->hl)];
    }
}
