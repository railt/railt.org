<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Railt\Foundation\Application;
use Railt\Http\RequestInterface;
use Railt\Io\File;

/**
 * Class ApiController
 */
class ApiController
{
    /**
     * @param RequestInterface $request
     * @param Application $graphql
     * @return array
     * @throws \Railt\SDL\Exceptions\TypeNotFoundException
     * @throws \Railt\SDL\Exceptions\CompilerException
     */
    public function handle(RequestInterface $request, Application $graphql): array
    {
        $schema = File::fromPathname(\resource_path('graphql/schema.graphqls'));

        return $graphql->request($schema, $request)->toArray();
    }
}
