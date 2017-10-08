<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use App\Services\Language;
use App\Services\Renderer\ContentRenderer;
use App\Services\Renderer\MarkdownRenderer;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(Language::class);
        $this->app->singleton(ContentRenderer::class, MarkdownRenderer::class);
    }
}
