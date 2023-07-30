<?php

declare(strict_types=1);

namespace App\MathParser\Ast;

use Phplrt\Contracts\Ast\NodeInterface;

abstract class TreeNode implements NodeInterface
{
    /**
     * @param int<0, max> $offset
     */
    public function __construct(
        //private int $offset = 0,
    ) {
    }

    /**
     * @return int<0, max>
     */
    public function getOffset(): int
    {
        return 0;
    }

    public function getIterator(): \Traversable
    {
        return new \EmptyIterator();
    }
}
