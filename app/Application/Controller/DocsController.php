<?php

declare(strict_types=1);

namespace App\Application\Controller;

use App\Entity\NotFound;
use App\Entity\SearchIndex;
use App\Repository\DocumentationRepository;
use App\Repository\MenuRepository;
use App\Repository\SearchIndexRepository;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final readonly class DocsController
{
    public function __construct(
        private Environment $view,
        private MenuRepository $menu,
        private DocumentationRepository $docs,
        private UrlGeneratorInterface $routes,
    ) {
    }

    #[Route(
        path: '/docs/{path}',
        name: 'docs',
        requirements: ['path' => '[\w\-\d/\.]+'],
        defaults: ['path' => ''],
        priority: -1
    )]
    public function show(string $path): Response
    {
        if ($path === '') {
            return new RedirectResponse($this->routes->generate('docs', [
                'path' => 'guide/introduction',
            ]));
        }

        $page = $this->docs->findByPath($path);

        $result = $this->view->render('page/docs.html.twig', [
            'menu'    => $this->menu->findAll(),
            'current' => $path,
            'page'    => $page ?? new NotFound(),
        ]);

        return new Response($result, $page ? 200 : 404);
    }

    #[Route(path: '/docs/search.json', methods: ['POST'])]
    public function search(Request $request, SearchIndexRepository $search): JsonResponse
    {
        $queries = $search->getQueries((string)$request->get('query', ''));
        $items = $search->searchByWords($queries, 6);

        return new JsonResponse(
            $this->indexToJson($queries, $items)
        );
    }

    /**
     * @param array<string> $queries
     * @param array<SearchIndex> $indexes
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
