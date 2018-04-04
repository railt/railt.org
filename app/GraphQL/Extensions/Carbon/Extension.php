<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\GraphQL\Extensions\Carbon;

use Railt\Foundation\Extensions\BaseExtension;
use Railt\Io\File;
use Railt\Routing\Contracts\RouterInterface;
use Railt\SDL\Schema\CompilerInterface;

/**
 * Class DateTimeExtension
 */
class Extension extends BaseExtension
{
    /**
     * @param CompilerInterface $compiler
     * @param RouterInterface $router
     */
    public function boot(CompilerInterface $compiler, RouterInterface $router): void
    {
        $document = $compiler->compile(File::fromPathname(__DIR__ . '/datetime.graphqls'));

        //$document->
    }
}
