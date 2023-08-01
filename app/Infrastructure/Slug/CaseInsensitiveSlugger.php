<?php

declare(strict_types=1);

namespace App\Infrastructure\Slug;

use Symfony\Component\String\AbstractUnicodeString;
use Symfony\Component\String\Slugger\SluggerInterface;

final readonly class CaseInsensitiveSlugger implements SluggerInterface
{
    public function __construct(
        private SluggerInterface $slugger,
    ) {
    }

    public function slug(string $string, string $separator = '-', string $locale = null): AbstractUnicodeString
    {
        $result = $this->slugger->slug($string, $separator, $locale);

        return $result->lower();
    }
}
