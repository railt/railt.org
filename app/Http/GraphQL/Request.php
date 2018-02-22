<?php
/**
 * This file is part of Railt package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\GraphQL;

use Railt\Http\RequestInterface;
use Illuminate\Http\Request as Original;
use Railt\Http\Support\InteractWithData;
use Railt\Http\Support\ConfigurableRequest;
use Railt\Http\Support\ConfigurableRequestInterface;

/**
 * Class Request
 */
class Request implements RequestInterface, ConfigurableRequestInterface
{
    use InteractWithData;
    use ConfigurableRequest;

    /**
     * IlluminateRequest constructor.
     * @param Original $request
     * @throws \LogicException
     */
    public function __construct(Original $request)
    {
        $this->data = $request->isJson()
            ? $request->json()->all()
            : array_merge($request->all(), $request->request->all());
    }
}
