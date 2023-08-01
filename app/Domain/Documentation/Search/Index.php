<?php

namespace App\Domain\Documentation\Search;

use App\Domain\Documentation\Page;
use App\Domain\Shared\CreatedDateProvider;
use App\Domain\Shared\CreatedDateProviderInterface;
use App\Domain\Shared\IdentifiableInterface;
use App\Domain\Shared\UpdatedDateProvider;
use App\Domain\Shared\UpdatedDateProviderInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity, ORM\Table(name: 'search_index')]
class Index implements
    IdentifiableInterface,
    CreatedDateProviderInterface,
    UpdatedDateProviderInterface
{
    use CreatedDateProvider;
    use UpdatedDateProvider;

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\Column(type: IndexId::class)]
    private IndexId $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'integer')]
    private int $level;

    #[ORM\ManyToOne(targetEntity: Page::class, fetch: 'EAGER')]
    #[ORM\JoinColumn(name: 'page_id', referencedColumnName: 'id', nullable: false)]
    private Page $page;

    public function __construct(string $title, Page $page, int $level = 0)
    {
        $this->id = IndexId::fromNamespace(static::class);
        $this->title = $title;
        $this->page = $page;
        $this->level = $level;
    }

    public function getId(): IndexId
    {
        return $this->id;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int<0, max> $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function getPage(): Page
    {
        return $this->page;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
