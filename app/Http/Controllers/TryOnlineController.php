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
use Illuminate\Http\Request;
use Railt\Reflection\Compiler;
use Railt\Support\Filesystem\File;

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
     * @throws \Railt\Reflection\Exceptions\TypeNotFoundException
     * @throws \Railt\Reflection\Exceptions\TypeConflictException
     * @throws \Railt\Parser\Exceptions\UnrecognizedTokenException
     * @throws \Railt\Parser\Exceptions\UnexpectedTokenException
     * @throws \Railt\Parser\Exceptions\CompilerException
     * @throws \Railt\Parser\Exceptions\InitializationException
     */
    public function parse(CodeRequest $request): array
    {
        try {
            $content = $request->get('content');
            $result = (new Compiler())->compile(File::fromSources($content, 'OnlineEditor'));

            return [
                'result' => json_encode($result, JSON_PRETTY_PRINT)
            ];
        } catch (\Throwable $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }
}
