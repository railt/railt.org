<?php

declare(strict_types=1);

namespace App\Controller;

use App\MathParser\Ast\Expression;
use App\MathParser\AstDumper;
use Highlight\Highlighter;
use App\MathParser\MathParser;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

final class HomeController extends Controller
{
    /**
     * @var Highlighter
     */
    private Highlighter $hl;

    /**
     * @param Environment $view
     * @param Highlighter $hl
     */
    public function __construct(Environment $view, Highlighter $hl)
    {
        $this->hl = $hl;

        parent::__construct($view);
    }

    #[Route(path: '/')]
    public function index(): Response
    {
        return new Response(
            $this->view->render('page/home.html.twig')
        );
    }

    #[Route(path: '/math/parse.json', methods: ['POST'])]
    public function highlight(MathParser $parser, AstDumper $dumper, Request $request): Response
    {
        try {
            /** @var Expression $ast */
            $ast = $parser->parse((string)$request->getContent());

            $result = $this->view->render('page/home/highlight.html.twig', [
                'code' => $dumper->highlight($this->hl, $ast, 'App\\MathParser'),
                'result' => $ast->eval(),
            ]);
        } catch (\Throwable $e) {
            $result = $this->view->render('page/home/highlight-error.html.twig', [
                'message' => $e->getMessage(),
            ]);
        }

        return new Response($result);
    }
}
