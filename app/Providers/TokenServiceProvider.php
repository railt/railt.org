<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use App\Entity\User\FindableByToken;
use App\Entity\User\JwtTokenGenerator;
use App\Entity\User\ProvidesToken;
use Illuminate\Support\ServiceProvider;

/**
 * Class TokenServiceProvider
 */
class TokenServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->app->instance(JwtTokenGenerator::class, new JwtTokenGenerator());

        $this->app->alias(JwtTokenGenerator::class, FindableByToken::class);
        $this->app->alias(JwtTokenGenerator::class, ProvidesToken::class);
    }
}
