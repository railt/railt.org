<?php

declare(strict_types=1);

namespace App\Twig\HighlightExtension\Internal;

use Highlight\Highlighter;
use Twig\Error\SyntaxError;
use Twig\Node\Expression\ConstantExpression;
use Twig\Node\Node;
use Twig\Token;
use Twig\TokenParser\AbstractTokenParser;
use Twig\TokenStream;

/**
 * @internal This is an internal library class, please do not use it in your code.
 * @psalm-internal App\Twig\HighlightExtension
 */
class HighlightTokenParser extends AbstractTokenParser
{
    /**
     * @param Highlighter $hl
     */
    public function __construct(
        private readonly Highlighter $hl
    ) {
    }

    /**
     * @param Token $token
     * @return Node
     * @throws SyntaxError
     */
    public function parse(Token $token): Node
    {
        $lineno = $token->getLine();
        $stream = $this->parser->getStream();

        $value = $this->getCodeLanguage($stream);

        $stream->expect(Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse([$this, 'decideBlockEnd'], true);
        $stream->expect(Token::BLOCK_END_TYPE);

        return new HighlightedNode($this->hl, $value, $body, $lineno, $this->getTag());
    }

    /**
     * @param TokenStream $stream
     * @return string
     * @throws SyntaxError
     */
    private function getCodeLanguage(TokenStream $stream): string
    {
        if ($stream->test(Token::BLOCK_END_TYPE)) {
            return 'php';
        }

        $expr = $this->parser->getExpressionParser()
            ->parseExpression()
        ;

        if (! $expr instanceof ConstantExpression) {
            $message = 'An escaping strategy must be a string or false.';

            throw new SyntaxError($message, $stream->getCurrent()
                ->getLine(), $stream->getSourceContext());
        }

        return $expr->getAttribute('value');
    }

    public function decideBlockEnd(Token $token): bool
    {
        return $token->test('endcode');
    }

    /**
     * {@inheritDoc}
     */
    public function getTag(): string
    {
        return 'code';
    }
}
