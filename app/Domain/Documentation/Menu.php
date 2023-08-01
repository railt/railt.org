<?php

namespace App\Domain\Documentation;

use App\Domain\Documentation\Menu\Link;
use App\Domain\Shared\CreatedDateProvider;
use App\Domain\Shared\CreatedDateProviderInterface;
use App\Domain\Shared\IdentifiableInterface;
use App\Domain\Shared\UpdatedDateProvider;
use App\Domain\Shared\UpdatedDateProviderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity, ORM\Table(name: 'menu')]
#[ORM\Index(columns: ['priority'], name: 'menu_priority_idx')]
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

    /**
     * @var non-empty-string
     */
    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    /**
     * @var int<0, 32767>
     */
    #[ORM\Column(type: 'smallint')]
    private int $priority = 0;

    /**
     * @var Collection<Link>
     */
    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: Link::class, cascade: ['ALL'], fetch: 'EAGER', orphanRemoval: true)]
    private Collection $links;

    /**
     * @param non-empty-string $title
     */
    public function __construct(string $title)
    {
        $this->id = MenuId::fromNamespace(static::class);
        $this->title = $title;
        $this->links = new ArrayCollection();
    }

    /**
     * @return iterable<Link>
     */
    public function getLinks(): iterable
    {
        return $this->links;
    }

    public function removeLink(Link $link): void
    {
        $this->links->removeElement($link);
    }

    /**
     * @param iterable<Link> $links
     */
    public function setLinks(iterable $links): void
    {
        $this->links->clear();

        foreach ($links as $link) {
            if ($link->getMenu() !== $this) {
                throw new \InvalidArgumentException('Link must contain relation to valid Menu');
            }

            $this->addLink($link);
        }
    }

    public function addLink(Link $link): void
    {
        if (!$this->links->contains($link)) {
            $this->links->add($link);
        }
    }

    public function getId(): MenuId
    {
        return $this->id;
    }

    /**
     * @return non-empty-string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param non-empty-string $title
     */
    public function rename(string $title): void
    {
        assert($title !== '');

        $this->title = $title;
    }

    /**
     * @return int<0, 32767>
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int<0, 32767> $value
     */
    public function setPriority(int $value): void
    {
        $this->priority = $value;
    }
}
