<?php

namespace App\Domain\Documentation;

use App\Domain\Documentation\Menu\PageLink;
use App\Domain\Shared\CreatedDateProvider;
use App\Domain\Shared\CreatedDateProviderInterface;
use App\Domain\Shared\IdentifiableInterface;
use App\Domain\Shared\UpdatedDateProvider;
use App\Domain\Shared\UpdatedDateProviderInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity, ORM\Table(name: 'documentation')]
#[ORM\Index(columns: ['url'], name: 'documentation_url_idx')]
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

    #[ORM\Embedded(class: Content::class, columnPrefix: 'content_')]
    private Content $content;

    /**
     * @var Collection<PageLink>
     */
    #[ORM\OneToMany(mappedBy: 'page', targetEntity: PageLink::class, cascade: ['ALL'])]
    private Collection $links;

    /**
     * @param non-empty-string $title
     * @param non-empty-string $url
     */
    public function __construct(
        string $title,
        string $url,
        string|\Stringable $content = ''
    ) {
        $this->id = PageId::fromNamespace(static::class);
        $this->title = $title;
        $this->url = $url;
        $this->links = new ArrayCollection();

        if (!$content instanceof Content) {
            $content = new Content((string)$content);
        }

        $this->content = $content;
    }

    /**
     * @return iterable<PageLink>
     */
    public function getLinks(): iterable
    {
        return $this->links;
    }

    public function removeLink(PageLink $link): void
    {
        $this->links->removeElement($link);
    }

    /**
     * @param iterable<PageLink> $links
     */
    public function setLinks(iterable $links): void
    {
        $this->links->clear();

        foreach ($links as $link) {
            $this->addLink($link);
        }
    }

    public function addLink(PageLink $link): void
    {
        if (!$this->links->contains($link)) {
            if ($link->getPage() !== $this) {
                throw new \InvalidArgumentException('PageLink must contain relation to valid Page');
            }

            $this->links->add($link);
        }
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

    public function getContent(): Content
    {
        return $this->content;
    }
}
