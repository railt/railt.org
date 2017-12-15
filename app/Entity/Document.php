<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Common\Identifiable;
use App\Entity\Common\Timestampable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="docs")
 * @ORM\HasLifecycleCallbacks()
 */
class Document
{
    use Identifiable;
    use Timestampable;

    /**
     * @var Source
     * @ORM\ManyToOne(targetEntity=Source::class)
     * @ORM\JoinColumn(name="source_id", referencedColumnName="id")
     */
    private $source;

    /**
     * @var Language
     * @ORM\ManyToOne(targetEntity=Language::class)
     * @ORM\JoinColumn(name="source_id", referencedColumnName="id")
     */
    private $lang;

    /**
     * @var Page[]|Collection
     * @ORM\OneToMany(targetEntity=Page::class, mappedBy="document", cascade={"persist"})
     */
    private $pages;

    /**
     * Docs constructor.
     * @param Source $source
     * @param Language $language
     */
    public function __construct(Source $source, Language $language)
    {
        $this->lang = $language;
        $this->source = $source;

        $this->getPages();
        $this->bootTimestamps();
    }

    /**
     * @return Collection
     */
    public function getPages(): Collection
    {
        return $this->pages ?? ($this->pages = new ArrayCollection());
    }

    /**
     * @param Page $page
     * @return Document
     */
    public function addPage(Page $page): Document
    {
        $this->pages->removeElement($page);
        $this->pages->add($page);

        return $this;
    }

    /**
     * @param Page $page
     * @return bool
     */
    public function removePage(Page $page): bool
    {
        return $this->pages->removeElement($page);
    }

    /**
     * @return Language
     */
    public function getLanguage(): Language
    {
        return $this->lang;
    }

    /**
     * @return Source
     */
    public function getSource(): Source
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->getSource();
    }
}
