<?php

declare(strict_types=1);

namespace App\Application\Controller\Documentation;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[Route(path: '/docs', name: 'docs')]
final readonly class IndexController
{
    public function __construct(
        private UrlGeneratorInterface $routes,
    ) {
    }

    public function __invoke(): Response
    {
        return new RedirectResponse($this->routes->generate('docs.show', [
            'path' => 'introduction/graphql',
        ]));
    }
}
