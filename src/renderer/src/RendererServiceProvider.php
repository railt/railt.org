<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Renderer;

use Highlight\Highlighter;
use Illuminate\Support\ServiceProvider;
use Renderer\Hook\CodeHighlight;
use Renderer\Hook\HeaderAnchors;
use Renderer\Hook\QuoteFormatter;
use Renderer\Hook\RemoveLeadingHeader;
use Renderer\Hook\TrimContent;

/**
 * Class RendererServiceProvider
 */
class RendererServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->app->singleton(RendererInterface::class, function() {
            $renderer = new MarkdownRenderer();

            $renderer->addHook(new TrimContent());
            $renderer->addHook(new RemoveLeadingHeader());
            $renderer->addHook(new QuoteFormatter());
            $renderer->addHook(new CodeHighlight($this->app->make(Highlighter::class)));
            $renderer->addHook(new HeaderAnchors());
            $renderer->addHook(new TrimContent());

            return $renderer;
        });
    }
}
