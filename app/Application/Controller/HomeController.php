<?php

declare(strict_types=1);

namespace App\Application\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

#[Route(path: '/')]
final readonly class HomeController
{
    public function __construct(
        private Environment $view,
    ) {
    }

    public function __invoke(): Response
    {
        $view = $this->view->render('page/home.html.twig');

        return new Response($view);
    }
}
