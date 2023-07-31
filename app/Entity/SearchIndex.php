<?php

namespace App\Entity;

use App\Repository\SearchIndexRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SearchIndexRepository::class)]
class SearchIndex
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'integer')]
    private int $level;

    #[ORM\ManyToOne(targetEntity: Documentation::class, fetch: 'EAGER', inversedBy: 'searchIndexes')]
    #[ORM\JoinColumn(name: 'page_id', referencedColumnName: 'id', nullable: false)]
    private Documentation $page;

    /**
     * @param string $title
     * @param Documentation $page
     */
    public function __construct(string $title, Documentation $page)
    {
        $this->title = $title;
        $this->page = $page;
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

    public function getPage(): Documentation
    {
        return $this->page;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
