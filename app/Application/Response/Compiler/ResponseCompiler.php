<?php

declare(strict_types=1);

namespace App\Application\Response\Compiler;

use App\Infrastructure\Compiler\Compiler;

/**
 * @template TInput
 * @template TOutput
 *
 * @template-extends Compiler<TInput, TOutput>
 * @template-implements ResponseCompilerInterface<TInput, TOutput>
 */
abstract readonly class ResponseCompiler extends Compiler implements ResponseCompilerInterface
{
}
