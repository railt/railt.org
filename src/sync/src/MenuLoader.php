<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Sync;

use App\Entity\Document;
use App\Entity\Language;
use App\Entity\Menu;
use App\Entity\Repositories\DocumentRepository;
use App\Entity\Repositories\MenuRepository;
use App\Entity\Urn;
use Illuminate\Support\Str;

/**
 * Class MenuLoader
 */
class MenuLoader
{
    /**
     * @var DocumentRepository
     */
    private $docs;

    /**
     * MenuLoader constructor.
     * @param DocumentRepository $docs
     */
    public function __construct(DocumentRepository $docs)
    {
        $this->docs = $docs;
    }

    /**
     * @param MenuRepository $menus
     * @return \Generator|Menu[]
     * @throws \LogicException
     */
    public function load(MenuRepository $menus)
    {
        foreach ($this->getMenus($menus) as $menu) {
            if ($menu->getUrn()) {
                yield $menu;
            }
        }
    }

    /**
     * @param MenuRepository $menus
     * @return iterable|Menu[]
     * @throws \LogicException
     */
    private function getMenus(MenuRepository $menus): iterable
    {
        $documents = $this->docs->query->collect()
            ->sort(function (Document $a, Document $b): int {
                return (new Urn($a->getUrn()))->compare(new Urn($b->getUrn()));
            });

        /**
         * @var $urn Urn
         * @var $document Document
         */
        foreach ($documents as $document) {
            $urn   = new Urn($document->getUrn());
            $child = null;

            while ($urn) {
                $menu = $this->loadMenu($menus, $document->getLanguage(), $urn);
                $urn  = $urn->getParent();

                if ($child) {
                    $menu->append($child);
                }

                yield $child = $menu;
            }
        }
    }

    /**
     * @param MenuRepository $menus
     * @param Language $lang
     * @param Urn $urn
     * @return Menu
     */
    private function loadMenu(MenuRepository $menus, Language $lang, Urn $urn): Menu
    {
        $menu = $menus->findByLanguageAndUrn($lang, $urn->getValue());

        if (! $menu) {
            $page  = $this->docs->findByLanguageAndUrn($lang, $urn->getValue());
            $title = $page ? $page->getTitle() : Str::ucfirst($urn->getName());

            $menu = new Menu($lang, $title, $urn->getValue());

            if ($page) {
                $menu->related($page);
            }
        }

        return $menu;
    }
}
