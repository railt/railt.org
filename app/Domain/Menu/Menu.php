<?php

namespace App\Domain\Menu;

use App\Domain\Shared\CreatedDateProvider;
use App\Domain\Shared\CreatedDateProviderInterface;
use App\Domain\Shared\IdentifiableInterface;
use App\Domain\Shared\UpdatedDateProvider;
use App\Domain\Shared\UpdatedDateProviderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity, ORM\Table(name: 'menu')]
class Menu implements
    IdentifiableInterface,
    CreatedDateProviderInterface,
    UpdatedDateProviderInterface
{
    use CreatedDateProvider;
    use UpdatedDateProvider;

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\Column(type: MenuId::class)]
    private MenuId $id;

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

    public function __construct(string $title, string $url = null)
    {
        $this->id = MenuId::fromNamespace(static::class);
        $this->children = new ArrayCollection();
        $this->title = $title;

        if ($url !== null) {
            $this->url = \trim($url, '/');
        }
    }

    public function getId(): MenuId
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority = null): void
    {
        $this->priority = $priority ?? 0;
    }

    public function getParent(): ?Menu
    {
        return $this->parent;
    }

    public function setParent(Menu $menu = null): void
    {
        $this->parent = $menu;

        if ($this->parent) {
            $menu?->children->add($this);
        } else {
            $menu?->children->removeElement($this);
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
