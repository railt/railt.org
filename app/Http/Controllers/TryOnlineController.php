<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CodeRequest;
use Illuminate\Contracts\View\View;
use Monolog\Handler\BufferHandler;
use Monolog\Handler\NullHandler;
use Monolog\Logger;
use Railt\Compiler\Compiler;
use Railt\Compiler\Filesystem\File;

/**
 * Class TryOnlineController
 */
class TryOnlineController
{
    /**
     * @return View
     */
    public function show(): View
    {
        return \view('pages.editor');
    }

    /**
     * @param CodeRequest $request
     * @return array
     * @throws \Railt\Compiler\Exceptions\UnrecognizedTokenException
     * @throws \Railt\Compiler\Exceptions\UnexpectedTokenException
     * @throws \Railt\Compiler\Exceptions\TypeNotFoundException
     * @throws \Railt\Compiler\Exceptions\TypeConflictException
     * @throws \Railt\Compiler\Exceptions\CompilerException
     * @throws \Railt\Compiler\Exceptions\InitializationException
     */
    public function parse(CodeRequest $request): array
    {
        $trace = new class(new NullHandler(), 2048) extends BufferHandler
        {
            public $buffer = [];
        };

        $logger = new Logger('Backtrace', [$trace]);

        $result = [];
        $error  = '';

        try {
            $content = $request->get('content');
            $sources = File::fromSources($content, 'example.graphqls');

            $compiler = new Compiler(null, $logger);
            $document = $compiler->compile($sources);

            foreach ($document->getDefinitions() as $definition) {
                $result[] = $definition;
            }
        } catch (\Throwable $e) {
            $error = $e->getMessage();
        }

        return [
            'result' => \json_encode($result, JSON_PRETTY_PRINT),
            'trace'  => $trace->buffer,
            'error'  => $error,
        ];
    }
}
