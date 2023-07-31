<?php

namespace App\Domain\Documentation;

use App\Domain\Search\Index;
use App\Domain\Shared\CreatedDateProvider;
use App\Domain\Shared\CreatedDateProviderInterface;
use App\Domain\Shared\IdentifiableInterface;
use App\Domain\Shared\UpdatedDateProvider;
use App\Domain\Shared\UpdatedDateProviderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity, ORM\Table(name: 'documentation')]
class Page implements
    IdentifiableInterface,
    CreatedDateProviderInterface,
    UpdatedDateProviderInterface
{
    use CreatedDateProvider;
    use UpdatedDateProvider;

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\Column(type: PageId::class)]
    private PageId $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'string', length: 255)]
    private string $url;

    #[ORM\Column(type: 'text')]
    private string $content;

    /**
     * @var Collection<Index>
     */
    #[ORM\OneToMany(mappedBy: 'page', targetEntity: Index::class, orphanRemoval: true)]
    private Collection $searchIndexes;

    public function __construct(string $title, string $url, string $content = '')
    {
        $this->id = PageId::fromNamespace(static::class);
        $this->title = $title;
        $this->url = $url;
        $this->content = $content;
        $this->searchIndexes = new ArrayCollection();
    }

    public function getId(): PageId
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
