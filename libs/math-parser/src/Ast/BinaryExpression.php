<?php

declare(strict_types=1);

namespace App\MathParser\Ast;

abstract class BinaryExpression extends TreeNode implements Expression
{
    /**
     * @var Expression
     */
    public Expression $a;

    /**
     * @var Expression
     */
    public Expression $b;

    /**
     * @param array{Expression, Expression} $children
     * @param positive-int|0 $offset
     */
    public function __construct(array $children, int $offset)
    {
        parent::__construct($offset);

        [$this->a, $this->b] = $children;
    }

    /**
     * @return \Traversable<Expression>
     */
    public function getIterator(): \Traversable
    {
        yield 'a' => $this->a;
        yield 'b' => $this->b;
    }
}
