<?php

declare(strict_types=1);

namespace App\Application\Controller\Documentation;

use App\Domain\Search\Index;
use App\Domain\Search\IndexRepositoryInterface;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/docs/search.json', methods: ['POST'], stateless: true)]
final readonly class SearchController
{
    public function __construct(
        private IndexRepositoryInterface $index,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $queries = $this->index->getQueries((string)$request->get('query', ''));
        $items = $this->index->searchByWords($queries, 6);

        return new JsonResponse($this->indexToJson($queries, $items));
    }

    /**
     * @param array<string> $queries
     * @param array<Index> $indexes
     */
    private function indexToJson(array $queries, array $indexes): array
    {
        $result = [];

        foreach ($indexes as $index) {
            $page = $index->getPage();

            $result[] = [
                'title' => $index->getTitle(),
                'url'   => '/docs/' . $page->getUrl() . '#' . Str::slug($index->getTitle()),
                'page'  => $page->getTitle(),
                'found' => $index->getHighlights($queries),
            ];
        }

        return $result;
    }
}
