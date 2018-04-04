<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Menu;

use App\Entity\Documentation;
use App\Entity\Menu;
use Illuminate\Support\Str;

/**
 * Class Reader
 */
class Reader
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $urn;

    /**
     * @var FindableByUrn
     */
    private $menus;

    /**
     * Reader constructor.
     * @param string $title
     * @param string $urn
     * @param FindableByUrn $menu
     */
    public function __construct(string $title, string $urn, FindableByUrn $menu)
    {
        $this->title = $title;
        $this->urn   = $urn;
        $this->menus = $menu;
    }

    /**
     * @param FindableByUrn $menu
     * @param Documentation $documentation
     * @return Reader
     */
    public static function fromDocumentation(FindableByUrn $menu, Documentation $documentation): Reader
    {
        return new static($documentation->getTitle(), $documentation->getUrn(), $menu);
    }

    /**
     * @return Menu[]|\Traversable
     */
    public function toMenus(): \Traversable
    {
        $parent = null;
        $urn    = $this->urn;

        while (\trim($urn)) {
            yield $parent = $this->get($urn, $parent);

            $parts = \explode('/', $urn);
            \array_pop($parts);
            $urn = \implode('/', $parts);
        }
    }

    /**
     * @param string $urn
     * @param Menu|null $parent
     * @return Menu
     */
    private function get(string $urn, ?Menu $parent): Menu
    {
        $result = $this->menus->findByUrn($urn) ??
            new Menu(Str::title($urn), $urn);

        if ($parent) {
            $result->attach($parent);
        }

        return $result;
    }
}
