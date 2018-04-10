<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\User;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class TokenAuthenticator
 */
class TokenAuthenticator
{
    private const NAME_HEADER = 'Authorization';
    private const NAME_HEADER_PREFIX = 'Bearer';

    /**
     * @var FindableByToken
     */
    private $repository;

    /**
     * @var FindableById
     */
    private $users;
    
    /**
     * @var Guard
     */
    private $guard;

    /**
     * TokenAuthenticator constructor.
     * @param FindableByToken $repository
     * @param FindableById $users
     * @param Guard $guard
     */
    public function __construct(FindableByToken $repository, FindableById $users, Guard $guard)
    {
        $this->repository = $repository;
        $this->users = $users;
        $this->guard = $guard;
    }

    /**
     * @param Request $request
     * @return bool
     */
    private function hasAuthHeader(Request $request): bool
    {
        $header = (string)$request->headers->get(self::NAME_HEADER);

        return $request->headers->has(self::NAME_HEADER) &&
            Str::startsWith($header, self::NAME_HEADER_PREFIX);
    }

    /**
     * @param Request $request
     * @return string
     */
    private function readFromAuthHeader(Request $request): string
    {
        $header = $request->headers->get(self::NAME_HEADER);
        $length = Str::length(self::NAME_HEADER_PREFIX);

        return \trim(Str::substr((string)$header, $length));
    }

    /**
     * @param Request $request
     * @return Authenticatable|null
     */
    public function fromRequest(Request $request): ?Authenticatable
    {
        if (! $this->hasAuthHeader($request)) {
            return null;
        }

        $token = $this->readFromAuthHeader($request);

        $user = $this->repository->getUser($this->users, $token);

        if ($user) {
            $this->guard->setUser($user);
        }

        return $user;
    }
}
