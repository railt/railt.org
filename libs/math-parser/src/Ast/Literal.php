<?php

declare(strict_types=1);

namespace App\MathParser\Ast;

use Phplrt\Contracts\Lexer\TokenInterface;

final class Literal extends TreeNode implements Expression
{
    /**
     * @var int|float
     */
    private int|float $value;

    /**
     * @param TokenInterface $value
     * @param positive-int|0 $offset
     */
    public function __construct(TokenInterface $value, int $offset)
    {
        parent::__construct($offset);

        $this->value = $value->getName() === 'T_INT'
            ? (int)$value->getValue()
            : (float)$value->getValue()
        ;
    }

    /**
     * @return float|int
     */
    public function eval(): float|int
    {
        return $this->value;
    }
}
