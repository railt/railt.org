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
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Monolog\Handler\BufferHandler;
use Monolog\Handler\NullHandler;
use Monolog\Logger;
use Railt\Compiler\Compiler;
use Railt\Compiler\Exceptions\SchemaException;
use Railt\Reflection\Filesystem\File;

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
        return \view('pages.editor', [
            'version' => $this->getCompilerVersion()
        ]);
    }

    /**
     * @return string
     */
    private function getCompilerVersion(): string
    {
        $content = \file_get_contents(\base_path('composer.lock'));
        $content = \collect(\json_decode($content, true)['packages']);

        $package = $content->where('name', 'railt/railt')->first();

        return $package['version'] . '@' .
            Str::substr($package['source']['reference'], 0, 7) .
            ' (' . Carbon::parse($package['time'])->toDateTimeString() . ')';
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
        $result = [];
        $trace  = [];
        $error  = '';

        $content = $request->get('content');
        $sources = new class($content, 'example.graphqls', true) extends File {
            public function __construct(string $sources, ?string $name, bool $virtual = true) {
                parent::__construct($sources, $name, $virtual);
                $this->definitionLine = 0;
            }
        };

        try {
            $compiler = new Compiler(null);
            $document = $compiler->compile($sources);

            foreach ($document->getDefinitions() as $definition) {
                $result[] = $definition;
            }
        } catch (SchemaException $e) {
            $error = \str_replace(\base_path('vendor/railt/railt'), '', (string)$e);
            $trace = \collect($e->getCompilerTrace())
                ->map(function(array $data) {
                    return [
                        'message' => $data['file'] . ':' . $data['line'] . ':' . $data['column']
                    ];
                })->toArray();
        } catch (\Throwable $e) {
            $error = $e->getMessage();
        }

        return [
            'result' => \json_encode($result, JSON_PRETTY_PRINT),
            'trace'  => $trace,
            'error'  => $error,
        ];
    }
}
