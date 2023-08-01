<?php

declare(strict_types=1);

namespace App\Infrastructure\Compiler;

/**
 * @template TInput
 * @template TOutput
 *
 * @template-implements CompilerInterface<TInput, TOutput>
 */
abstract readonly class Compiler implements CompilerInterface
{
}
