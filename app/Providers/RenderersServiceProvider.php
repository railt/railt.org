<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use App\Entity\Page;
use App\Entity\Renderers;
use Illuminate\Support\ServiceProvider;

/**
 * Class RenderersServiceProvider
 */
class RenderersServiceProvider extends ServiceProvider
{
    /**
     * Defaults
     */
    private const DEFAULT_RENDERER = Renderers\MarkdownRenderer::class;

    /**
     * @var array
     */
    private $renderers = [
        Renderers\RawRenderer::class,
        Renderers\MenuRenderer::class,
        Renderers\MarkdownRenderer::class,
        Renderers\ContentRenderer::class,

        // Factories
        Page\Renderer::class,
    ];

    /**
     * @return void
     */
    public function boot(): void
    {
        foreach ($this->renderers as $renderer) {
            $this->app->singleton($renderer);
        }

        $this->app->alias(self::DEFAULT_RENDERER, Renderers\Renderer::class);
    }
}
