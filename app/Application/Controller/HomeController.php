<?php

declare(strict_types=1);

namespace App\Application\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

final readonly class HomeController
{
    public function __construct(
        private Environment $view,
    ) {
    }

    #[Route(path: '/')]
    public function index(): Response
    {
        return new Response($this->view->render('page/home.html.twig'));
    }
}
