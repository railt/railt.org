<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entity\User\CreatableFromSocialite;
use App\Entity\User\FindableByService;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Socialite\Contracts\Factory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AuthController
 */
class AuthController extends Controller
{
    /**
     * @var Factory
     */
    private $socialite;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var Guard|StatefulGuard
     */
    private $guard;

    /**
     * AuthController constructor.
     * @param Factory $socialite
     * @param EntityManagerInterface $em
     * @param Guard $guard
     */
    public function __construct(Factory $socialite, EntityManagerInterface $em, Guard $guard)
    {
        $this->em        = $em;
        $this->guard     = $guard;
        $this->socialite = $socialite;
    }

    /**
     * @return array
     */
    public static function getProviders(): array
    {
        return ['github'];
    }

    /**
     * @param string $provider
     * @return RedirectResponse
     */
    public function redirect(string $provider): RedirectResponse
    {
        return $this->socialite->driver($provider)->redirect();
    }

    /**
     * @return RedirectResponse
     * @throws \InvalidArgumentException
     */
    public function logout(): RedirectResponse
    {
        $this->guard->logout();

        return \redirect()->route('home');
    }
}
