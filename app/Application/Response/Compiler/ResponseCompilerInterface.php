<?php

declare(strict_types=1);

namespace App\Application\Response\Compiler;

use App\Infrastructure\Compiler\CompilerInterface;

/**
 * @template TInput
 * @template TOutput
 *
 * @template-extends CompilerInterface<TInput, TOutput>
 */
interface ResponseCompilerInterface extends CompilerInterface
{
}
