<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Common\Identifiable;
use App\Entity\Common\Identifier;
use App\Entity\Common\Timestampable;
use App\Entity\Common\Timestamps;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Menu
 */
class Menu implements Identifiable, Timestampable
{
    use Identifier;
    use Timestamps;

    /**
     * @var string
     */
    public const ROOT_MENU_ITEM = 'README';

    /**
     * @var string
     */
    protected $title;

    /**
     * @var Language
     */
    protected $language;

    /**
     * @var Urn
     */
    protected $urn;

    /**
     * @var int
     */
    protected $orderId = 0;

    /**
     * @var Menu|null
     */
    protected $parent;

    /**
     * @var Menu[]|ArrayCollection
     */
    protected $children;

    /**
     * @var Document|null
     */
    protected $document;

    /**
     * Menu constructor.
     * @param Language $language
     * @param string $title
     * @param string $urn
     */
    public function __construct(Language $language, string $title, string $urn = '')
    {
        $this->title = $title;
        $this->language = $language;

        $this->urn = new Urn($urn);
        $this->children = new ArrayCollection();

        $this->actualize();
    }

    /**
     * @param Document|null $document
     * @return Menu
     */
    public function related(?Document $document): Menu
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return iterable|Menu[]
     */
    public function getChildren(): iterable
    {
        return $this->children;
    }

    /**
     * @return bool
     */
    public function hasChildren(): bool
    {
        return $this->children->count() > 0;
    }

    /**
     * @return Menu|null
     */
    public function getParent(): ?Menu
    {
        return $this->parent;
    }

    /**
     * @return Language
     */
    public function getLanguage(): Language
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getUrn(): string
    {
        return \str_replace(self::ROOT_MENU_ITEM, '', $this->urn->getValue());
    }

    /**
     * @param string $title
     * @return Menu
     */
    public function rename(string $title): Menu
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function append(Menu $menu): Menu
    {
        $menu->parent = $this;
        $this->children->add($menu);

        return $this;
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function of(Menu $menu): Menu
    {
        $this->parent = $menu;
        $menu->children->add($this);

        return $this;
    }

    /**
     * @return bool
     */
    public function hasDocument(): bool
    {
        return $this->getDocument() !== null;
    }

    /**
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }
}
