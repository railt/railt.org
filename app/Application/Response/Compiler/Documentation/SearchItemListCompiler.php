<?php

declare(strict_types=1);

namespace App\Application\Response\Compiler\Documentation;

use App\Application\Response\Compiler\ResponseCompiler;
use App\Application\Response\DTO\Documentation\SearchItemResponseDTO;
use App\Domain\Documentation\Search\Result;

/**
 * @template-extends ResponseCompiler<iterable<Result>, iterable<SearchItemResponseDTO>>
 */
final readonly class SearchItemListCompiler extends ResponseCompiler
{
    public function __construct(
        private SearchItemCompiler $compiler,
    ) {}

    public function compile(mixed $entry): iterable
    {
        assert(\is_iterable($entry));

        $result = [];

        /** @var Result $result */
        foreach ($entry as $item) {
            $result[] = $this->compiler->compile(
                entry: $item->index,
                occurrences: $item->occurrences,
            );
        }

        return $result;
    }
}
