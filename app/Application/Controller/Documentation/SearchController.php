<?php

declare(strict_types=1);

namespace App\Application\Controller\Documentation;

use App\Application\Request\DTO\Documentation\SearchRequestDTO;
use App\Application\Response\Compiler\Documentation\SearchItemListCompiler;
use App\Domain\Documentation\Search;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/docs/search.json', methods: ['POST'], stateless: true)]
final readonly class SearchController
{
    public function __construct(
        private SearchItemListCompiler $compiler,
        private Search $search,
    ) {
    }

    public function __invoke(#[MapRequestPayload] SearchRequestDTO $dto): JsonResponse
    {
        $response = $this->compiler->compile(
            $this->search->findAllByQuery($dto->query),
        );

        return new JsonResponse($response);
    }
}
