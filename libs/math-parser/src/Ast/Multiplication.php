<?php

declare(strict_types=1);

namespace App\MathParser\Ast;

final class Multiplication extends BinaryExpression
{
    /**
     * @return float|int
     */
    public function eval(): float|int
    {
        return $this->a->eval() * $this->b->eval();
    }
}
