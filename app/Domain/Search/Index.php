<?php

namespace App\Domain\Search;

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

    #[ORM\ManyToOne(targetEntity: Page::class, fetch: 'EAGER', inversedBy: 'searchIndexes')]
    #[ORM\JoinColumn(name: 'page_id', referencedColumnName: 'id', nullable: false)]
    private Page $page;

    public function __construct(string $title, Page $page)
    {
        $this->id = IndexId::fromNamespace(static::class);
        $this->title = $title;
        $this->page = $page;
    }

    public function getId(): IndexId
    {
        return $this->id;
    }

    /**
     * @param array $queries
     * @return iterable<string>
     */
    public function getHighlights(array $queries): iterable
    {
        $queries = \array_map(static fn(string $query): string =>
            \preg_quote($query, '/'),
            $queries,
        );

        $pcre = '/(' . \implode('|', $queries) . ')/isum';

        \preg_match_all($pcre, $this->title, $matches);

        return \array_unique($matches[1] ?? []);
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
