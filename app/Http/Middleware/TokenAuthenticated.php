<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TokenAuthenticated
 */
class TokenAuthenticated
{
    /**
     * @param Request $request
     * @param \Closure $then
     * @return Response
     */
    public function handle(Request $request, \Closure $then): Response
    {
        //dd($request->headers->get('Authorization'));

        return $then($request);
    }
}
