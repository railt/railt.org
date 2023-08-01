<?php

declare(strict_types=1);

namespace Local\ContentRenderer;

interface ContentRendererInterface
{
    public function render(string $markdown): string;
}
