<?php

namespace App\Entity;

use App\Repository\DocumentationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentationRepository::class)]
class Documentation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'string', length: 255)]
    private string $url;

    #[ORM\Column(type: 'text')]
    private string $content;

    /**
     * @var Collection<SearchIndex>
     */
    #[ORM\OneToMany(mappedBy: 'page', targetEntity: SearchIndex::class, orphanRemoval: true)]
    private Collection $searchIndexes;

    /**
     * @param string $title
     * @param string $url
     * @param string $content
     */
    public function __construct(string $title, string $url, string $content = '')
    {
        $this->title = $title;
        $this->url = $url;
        $this->content = $content;
        $this->searchIndexes = new ArrayCollection();
    }

    public function getId(): ?int
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
