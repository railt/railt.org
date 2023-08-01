<?php

declare(strict_types=1);

namespace App\Application\Controller\Documentation;

use App\Domain\Documentation\MenuRepositoryInterface;
use App\Domain\Documentation\NotFound;
use App\Domain\Documentation\PageRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

#[Route(path: '/docs/{path}', name: 'docs.show', requirements: ['path' => '[\w\-\d/\.]+'], priority: -1)]
final readonly class ShowController
{
    public function __construct(
        private Environment $view,
        private MenuRepositoryInterface $menu,
        private PageRepositoryInterface $docs,
    ) {
    }

    public function __invoke(string $path): Response
    {
        $page = $this->docs->findByPath($path);

        $result = $this->view->render('page/docs.html.twig', [
            'menu'    => $this->menu->findAll(),
            'current' => $path,
            'page'    => $page ?? new NotFound(),
        ]);

        return new Response($result, $page ? 200 : 404);
    }
}
