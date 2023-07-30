<?php

use App\MathParser\Ast;

return [
    'initial' => 0,
    'tokens' => [
        'default' => [
            'T_FLOAT' => '\\d+\\.\\d+',
            'T_INT' => '\\d+',
            'T_PLUS' => '\\+',
            'T_MINUS' => '\\-',
            'T_MUL' => '\\*',
            'T_DIV' => '[/÷]',
            'T_BRACE_OPEN' => '\\(',
            'T_BRACE_CLOSE' => '\\)',
            'T_WHITESPACE' => '\\s+',
        ],
    ],
    'skip' => [
        'T_WHITESPACE',
    ],
    'transitions' => [
        
    ],
    'grammar' => [
        0 => new \Phplrt\Parser\Grammar\Concatenation([1]),
        1 => new \Phplrt\Parser\Grammar\Concatenation([2]),
        2 => new \Phplrt\Parser\Grammar\Concatenation([8, 3]),
        3 => new \Phplrt\Parser\Grammar\Concatenation([14, 9]),
        4 => new \Phplrt\Parser\Grammar\Lexeme('T_PLUS', true),
        5 => new \Phplrt\Parser\Grammar\Lexeme('T_MINUS', true),
        6 => new \Phplrt\Parser\Grammar\Alternation([4, 5]),
        7 => new \Phplrt\Parser\Grammar\Concatenation([3, 6]),
        8 => new \Phplrt\Parser\Grammar\Repetition(7, 0, INF),
        9 => new \Phplrt\Parser\Grammar\Alternation([17, 18]),
        10 => new \Phplrt\Parser\Grammar\Lexeme('T_DIV', true),
        11 => new \Phplrt\Parser\Grammar\Lexeme('T_MUL', true),
        12 => new \Phplrt\Parser\Grammar\Alternation([10, 11]),
        13 => new \Phplrt\Parser\Grammar\Concatenation([9, 12]),
        14 => new \Phplrt\Parser\Grammar\Repetition(13, 0, INF),
        15 => new \Phplrt\Parser\Grammar\Lexeme('T_BRACE_OPEN', false),
        16 => new \Phplrt\Parser\Grammar\Lexeme('T_BRACE_CLOSE', false),
        17 => new \Phplrt\Parser\Grammar\Concatenation([15, 0, 16]),
        19 => new \Phplrt\Parser\Grammar\Lexeme('T_FLOAT', true),
        20 => new \Phplrt\Parser\Grammar\Lexeme('T_INT', true),
        18 => new \Phplrt\Parser\Grammar\Alternation([19, 20])
    ],
    'reducers' => [
        0 => function (\Phplrt\Parser\Context $ctx, $children) {
            return \is_array($children) ? $children[0] : $children;
        },
        2 => function (\Phplrt\Parser\Context $ctx, $children) {
            while (\count($children) >= 3) {
            [$a, $op, $b] = [
                \array_shift($children),
                \array_shift($children),
                \array_shift($children),
            ];
    
            switch ($op->getName()) {
                case 'T_PLUS':
                    \array_unshift($children, new Ast\Addition([$a, $b], $a->getOffset()));
                    break;
    
                case 'T_MINUS':
                    \array_unshift($children, new Ast\Subtraction([$a, $b], $a->getOffset()));
                    break;
            }
        }
    
        return $children;
        },
        3 => function (\Phplrt\Parser\Context $ctx, $children) {
            while (\count($children) >= 3) {
            [$a, $op, $b] = [
                \array_shift($children),
                \array_shift($children),
                \array_shift($children),
            ];
    
            switch ($op->getName()) {
                case 'T_DIV':
                    \array_unshift($children, new Ast\Division([$a, $b], $a->getOffset()));
                    break;
    
                case 'T_MUL':
                    \array_unshift($children, new Ast\Multiplication([$a, $b], $a->getOffset()));
                    break;
            }
        }
    
        return $children;
        },
        18 => function (\Phplrt\Parser\Context $ctx, $children) {
            $token = $ctx->getToken();
            $offset = $token->getOffset();
            return new Ast\Literal($children, $offset);
        }
    ]
];