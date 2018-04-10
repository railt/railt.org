<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Middleware;

use App\Entity\User;
use App\Entity\User\TokenAuthenticator;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TokenAuthenticated
 */
class TokenAuthenticated
{
    /**
     * @var TokenAuthenticator
     */
    private $auth;

    /**
     * @var Container
     */
    private $container;

    /**
     * TokenAuthenticated constructor.
     * @param TokenAuthenticator $auth
     * @param Container $container
     */
    public function __construct(TokenAuthenticator $auth, Container $container)
    {
        $this->auth      = $auth;
        $this->container = $container;
    }

    /**
     * @param Request $request
     * @param \Closure $then
     * @return Response
     */
    public function handle(Request $request, \Closure $then): Response
    {
        $user = $this->auth->fromRequest($request);

        if ($user) {
            $this->container->instance(User::class, $user);
            $this->container->alias(User::class, Authenticatable::class);
            $this->container->alias(User::class, Authorizable::class);
        }

        return $then($request);
    }
}
