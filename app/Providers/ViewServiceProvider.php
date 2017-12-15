<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use App\View\Composers;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Factory;
use Illuminate\View\View;

/**
 * Class ViewServiceProvider
 */
class ViewServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    private $composers = [
        Composers\LanguageComposer::class => '*',
    ];

    /**
     * @param Factory $views
     * @return void
     * @throws \InvalidArgumentException
     */
    public function boot(Factory $views): void
    {
        /** @var BladeCompiler $blade */
        $blade = $views->getEngineResolver()->resolve('blade')->getCompiler();

        $this->directives($blade);
        $this->composers($views, $this->composers);
    }

    /**
     * @param BladeCompiler $blade
     * @return void
     */
    private function directives(BladeCompiler $blade): void
    {
        $blade->if('env', function ($environment) {
            return app()->environment($environment);
        });
    }

    /**
     * @param Factory $views
     * @param array $composers
     * @return void
     */
    private function composers(Factory $views, array $composers): void
    {
        foreach ($composers as $class => $patterns) {
            $this->app->singleton($class, $class);

            $views->composer($patterns, function(View $view) use ($class) {
                return $this->app->make($class)->compose($view);
            });
        }
    }
}
