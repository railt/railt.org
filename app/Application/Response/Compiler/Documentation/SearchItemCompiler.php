<?php

declare(strict_types=1);

namespace App\Application\Response\Compiler\Documentation;

use App\Application\Response\Compiler\ResponseCompiler;
use App\Application\Response\DTO\Documentation\SearchItemResponseDTO;
use App\Domain\Documentation\Page;
use App\Domain\Documentation\Search\Index;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @template-extends ResponseCompiler<Index, SearchItemResponseDTO>
 */
final readonly class SearchItemCompiler extends ResponseCompiler
{
    public function __construct(
        private UrlGeneratorInterface $generator,
        private SluggerInterface $slugger,
    ) {}

    /**
     * @param Index $entry
     * @param list<non-empty-string> $occurrences
     */
    public function compile(mixed $entry, array $occurrences = []): SearchItemResponseDTO
    {
        assert($entry instanceof Index);

        $page = $entry->getPage();

        return new SearchItemResponseDTO(
            page: $page->getTitle(),
            title: $entry->getTitle(),
            url: $this->getUrl($page, $entry),
            found: \array_filter($occurrences),
        );
    }

    private function getUrl(Page $page, Index $index): string
    {
        $url = $this->generator->generate('docs.show', [
            'path' => $page->getUrl(),
        ]);

        return $url . '#' . $this->slugger->slug($index->getTitle());
    }
}
