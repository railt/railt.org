<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $url = null;

    /**
     * @var positive-int|0
     */
    #[ORM\Column(type: 'integer')]
    private int $priority = 0;

    #[ORM\ManyToOne(targetEntity: Menu::class, inversedBy: 'children')]
    #[ORM\JoinColumn(name: 'parent_id', referencedColumnName: 'id')]
    private ?Menu $parent;

    /**
     * @var Collection<Menu>
     */
    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: Menu::class)]
    private Collection $children;

    /**
     * @param string $title
     * @param string|null $url
     */
    public function __construct(string $title, string $url = null)
    {
        $this->children = new ArrayCollection();
        $this->title = $title;

        if ($url !== null) {
            $this->url = \trim($url, '/');
        }
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int|null $priority
     */
    public function setPriority(int $priority = null): void
    {
        $this->priority = $priority ?? 0;
    }

    /**
     * @return Menu|null
     */
    public function getParent(): ?Menu
    {
        return $this->parent;
    }

    /**
     * @param Menu|null $menu
     */
    public function setParent(Menu $menu = null): void
    {
        $this->parent = $menu;

        if ($this->parent) {
            $menu->children->add($this);
        } else {
            $menu->children->removeElement($this);
        }
    }

    /**
     * @return Collection<Menu>
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }
}
