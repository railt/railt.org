<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Common\Identifiable;
use App\Entity\Common\Identifier;
use App\Entity\Common\Timestampable;
use App\Entity\Common\Timestamps;
use App\Entity\Repository\MenuRepository;

/**
 * Class Menu
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 * @ORM\Table(name="menu")
 * @ORM\HasLifecycleCallbacks()
 */
class Menu implements Identifiable, Timestampable
{
    use Timestamps;
    use Identifier;

    /**
     * @ORM\Column(name="title", type="string")
     * @var string
     */
    protected $title;

    /**
     * @ORM\Column(name="urn", type="string")
     * @var string
     */
    protected $urn;

    /**
     * @ORM\OneToMany(targetEntity=Menu::class, mappedBy="parent", cascade={"persist"})
     * @var Menu[]|Collection
     */
    protected $children;

    /**
     * @ORM\ManyToOne(targetEntity=Menu::class, inversedBy="children", cascade={"persist"})
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     * @var Menu
     */
    protected $parent;

    /**
     * @ORM\Column(name="parent_id", type="integer", nullable=true)
     * @var int|null
     */
    protected $parentId;

    /**
     * @ORM\OneToOne(targetEntity=Documentation::class)
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id", nullable=true)
     * @var Documentation|null
     */
    protected $documentation;

    /**
     * @ORM\Column(name="order_id", type="integer")
     * @var int
     */
    protected $order = 0;

    /**
     * Menu constructor.
     * @param string $title
     * @param string $urn
     */
    public function __construct(string $title, string $urn)
    {
        $this->title = $title;
        $this->urn   = $urn;

        $this->children = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @param string $title
     * @return Menu
     */
    public function rename(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $urn
     * @return Menu
     */
    public function moveTo(string $urn): self
    {
        $this->urn = $urn;

        return $this;
    }

    /**
     * @param Documentation|null $documentation
     * @return Menu
     */
    public function withDocumentation(?Documentation $documentation): self
    {
        $this->documentation = $documentation;

        return $this;
    }

    /**
     * @return bool
     */
    public function isTab(): bool
    {
        return $this->getDocumentationPage() === null;
    }

    /**
     * @return bool
     */
    public function hasDocumentation(): bool
    {
        return $this->getDocumentationPage() !== null;
    }

    /**
     * @return Documentation|null
     */
    public function getDocumentationPage(): ?Documentation
    {
        return $this->documentation;
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function attach(Menu $menu): self
    {
        $this->children->add($menu);
        $menu->parent = $this;

        return $this;
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
        return $this->urn;
    }

    /**
     * @return Menu|null
     */
    public function getParent(): ?Menu
    {
        return $this->parent;
    }

    /**
     * @return Menu[]|Collection
     */
    public function getChildren(): \Traversable
    {
        return $this->children;
    }

    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->order;
    }
}