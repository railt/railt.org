<?php

declare(strict_types=1);

namespace App\Domain\Documentation\Menu;

use App\Domain\Documentation\Menu;
use App\Domain\Shared\CreatedDateProvider;
use App\Domain\Shared\CreatedDateProviderInterface;
use App\Domain\Shared\IdentifiableInterface;
use App\Domain\Shared\UpdatedDateProvider;
use App\Domain\Shared\UpdatedDateProviderInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'menu_links')]
#[ORM\InheritanceType('SINGLE_TABLE')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
#[ORM\DiscriminatorMap(['external' => ExternalLink::class, 'page' => PageLink::class])]
#[ORM\Index(columns: ['priority'], name: 'menu_links_priority_idx')]
abstract class Link implements
    IdentifiableInterface,
    CreatedDateProviderInterface,
    UpdatedDateProviderInterface
{
    use CreatedDateProvider;
    use UpdatedDateProvider;

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\Column(type: LinkId::class)]
    protected LinkId $id;

    /**
     * @var non-empty-string
     */
    #[ORM\Column(type: 'string', length: 255)]
    protected string $title;

    /**
     * @var int<0, 32767>
     */
    #[ORM\Column(type: 'smallint')]
    protected int $priority = 0;

    /**
     * @var non-empty-string
     */
    #[ORM\Column(name: 'url', type: 'string', length: 255)]
    protected string $url;

    #[ORM\ManyToOne(targetEntity: Menu::class, cascade: ['ALL'], inversedBy: 'links')]
    #[ORM\JoinColumn(name: 'menu_id', referencedColumnName: 'id')]
    protected Menu $menu;

    /**
     * @param non-empty-string $title
     * @param non-empty-string $url
     */
    public function __construct(
        Menu $menu,
        string $title,
        string $url,
        LinkId $id = null,
    ) {
        $this->menu = $menu;
        $this->title = $title;
        $this->url = $url;
        $this->id = $id ?? LinkId::fromNamespace(static::class);

        $menu->addLink($this);
    }

    public function isPage(): bool
    {
        return $this instanceof PageLink;
    }

    public function getId(): LinkId
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getMenu(): Menu
    {
        return $this->menu;
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
