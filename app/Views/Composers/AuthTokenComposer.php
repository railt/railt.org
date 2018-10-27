<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Views\Composers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\View\View;

/**
 * Class AuthTokenComposer
 */
class AuthTokenComposer
{
    /**
     * @var Guard|StatefulGuard
     */
    private $guard;

    /**
     * AuthTokenComposer constructor.
     * @param Guard $guard
     */
    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * @param View $view
     */
    public function compose(View $view): void
    {
        $view->with('token', '');
    }
}
