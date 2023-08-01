<?php

declare(strict_types=1);

namespace App\Application\Response\DTO\Documentation;

final readonly class SearchItemResponseDTO
{
    /**
     * @param non-empty-string $title
     * @param non-empty-string $url
     * @param non-empty-string $page
     * @param non-empty-string|null $menu
     * @param iterable<non-empty-string> $found
     */
    public function __construct(
        public string $page,
        public string $title,
        public string $url,
        public ?string $menu = null,
        public iterable $found = [],
    ) {}
}
