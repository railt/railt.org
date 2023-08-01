<?php

declare(strict_types=1);

namespace App\Application\Request\DTO\Documentation;

use Symfony\Component\Validator\Constraints as Assert;

final readonly class SearchRequestDTO
{
    /**
     * @param non-empty-string $query
     */
    public function __construct(
        #[Assert\NotBlank]
        public string $query,
    ) {}
}
