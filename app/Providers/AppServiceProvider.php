<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use App\Entity\Language;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 */
final class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Carbon::setLocale(\config('app.locale'));

        $this->app->singleton(Language::class, function() {
            /** @var Language\FindableByName $repository */
            $repository = $this->app->make(Language\FindableByName::class);

            return $repository->findByName($this->resolveLanguage()) ??
                $repository->findByName((string)\config('app.locale'));
        });
    }

    /**
     * @return string
     */
    private function resolveLanguage(): string
    {
        $host = \app(Request::class)->getHttpHost();

        if (\substr_count($host, '.') === 2) {
            return \array_first(\explode('.', $host));
        }

        return (string)\config('app.locale');
    }
}
