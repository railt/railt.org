<?php

declare(strict_types=1);

namespace App\Twig\HighlightExtension;

use App\Twig\HighlightExtension\Internal\HighlightTokenParser;
use Highlight\Highlighter;
use Twig\Extension\AbstractExtension;

final class HighlightExtension extends AbstractExtension
{
    public function __construct(
        private readonly Highlighter $hl
    ) {
    }

    public function getTokenParsers(): array
    {
        return [new HighlightTokenParser($this->hl)];
    }
}
