<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use Laravel\Socialite\Contracts\Factory;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class AuthController
 */
class AuthController extends Controller
{
    /**
     * @return array
     */
    public static function getProviders(): array
    {
        return ['github'];
    }

    /**
     * @param Factory $socialite
     * @param string $provider
     * @return RedirectResponse
     */
    public function redirect(Factory $socialite, string $provider): RedirectResponse
    {
        return $socialite->driver($provider)->redirect();
    }

    /**
     * @param Factory $socialite
     * @param string $provider
     */
    public function auth(Factory $socialite, string $provider): void
    {
        dd($socialite->driver($provider)->user());
    }
}
