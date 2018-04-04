<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console\Commands\Common;

use App\Entity\Documentation;
use App\Entity\Language;
use App\Entity\Menu;
use Illuminate\Contracts\Container\Container;

/**
 * Class RepositoriesLocator
 */
final class RepositoriesLocator
{
    /**
     * @var Container
     */
    private $container;

    /**
     * RepositoriesLocator constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @return Documentation\FindableByPath
     */
    public function docsByPath(): Documentation\FindableByPath
    {
        return $this->container->get(Documentation\FindableByPath::class);
    }

    /**
     * @return Documentation\FindableByUrn
     */
    public function docsByUrn(): Documentation\FindableByUrn
    {
        return $this->container->get(Documentation\FindableByUrn::class);
    }

    /**
     * @return Documentation\ContainsDocumentationPages
     */
    public function docs(): Documentation\ContainsDocumentationPages
    {
        return $this->container->get(Documentation\ContainsDocumentationPages::class);
    }

    /**
     * @return Language\FindableByName
     */
    public function langByName(): Language\FindableByName
    {
        return $this->container->get(Language\FindableByName::class);
    }

    /**
     * @return Menu\FindableByUrn
     */
    public function menuByUrn(): Menu\FindableByUrn
    {
        return $this->container->get(Menu\FindableByUrn::class);
    }
}
