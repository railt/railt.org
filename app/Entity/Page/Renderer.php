<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Page;

use App\Entity\Page;
use App\Entity\Renderers;
use Illuminate\Contracts\Container\Container;

/**
 * Class Factory
 */
class Renderer
{
    /**
     * @var array
     */
    private $renderers = [
        Page\Type::MENU    => Renderers\MenuRenderer::class,
        Page\Type::CONTENT => Renderers\ContentRenderer::class,
        Page\Type::HIDDEN  => Renderers\RawRenderer::class,
    ];

    /**
     * @var Container
     */
    private $container;

    /**
     * Factory constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param Page $page
     * @return Renderers\Renderer
     */
    public function resolve(Page $page): Renderers\Renderer
    {
        /** @var Renderers\Renderer $renderer */
        return $this->container->make($this->renderers[$page->getType()]);
    }
}
