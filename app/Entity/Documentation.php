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
use App\Entity\Common\Identifier;
use App\Entity\Common\Timestampable;
use App\Entity\Common\Timestamps;
use App\Entity\Content\ContentRendererListener;
use App\Entity\Content\HasContent;
use App\Entity\Documentation\ContainsNavigation;
use App\Entity\Documentation\Navigation;
use App\Entity\Documentation\NavigationExtractorListener;
use App\Entity\Documentation\Repository;
use App\Entity\Documentation\Type;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Documentation
 * @ORM\Entity(repositoryClass=Repository::class)
 * @ORM\Table(name="docs")
 * @ORM\EntityListeners({ ContentRendererListener::class, NavigationExtractorListener::class })
 * @ORM\HasLifecycleCallbacks()
 */
class Documentation implements
    HasContent,
    Identifiable,
    Timestampable,
    ContainsNavigation
{
    use Identifier;
    use Timestamps;

    public const STORAGE_DIRECTORY = 'docs';

    /**
     * Relation to document language.
     *
     * @ORM\ManyToOne(targetEntity=Language::class, inversedBy="docs", cascade={"persist"})
     * @var Language
     */
    protected $language;

    /**
     * The title of selection documentation page.
     *
     * @ORM\Column(name="title", type="string", nullable=true)
     * @var string|null
     */
    protected $title;

    /**
     * @ORM\Embedded(class=Navigation::class, columnPrefix=false)
     * @var Navigation
     */
    protected $nav;

    /**
     * The FQN "slug" of selected documentation page.
     *
     * @ORM\Column(name="urn", type="string")
     * @var string
     */
    protected $urn;

    /**
     * Physical document pathname
     *
     * @ORM\Column(name="path", type="string")
     * @var string
     */
    protected $path;

    /**
     * The generated hash in sha1 format which contains an
     * information about sync status of current documentation page.
     *
     * @ORM\Column(name="hash", type="string")
     * @var string|null
     */
    protected $hash;

    /**
     * @ORM\Embedded(class=Content::class, columnPrefix="content_")
     * @var Content
     */
    protected $content;

    /**
     * @var string
     * @ORM\Column(name="type", type=Type::class)
     */
    protected $type = Type::PAGE;

    /**
     * Documentation constructor.
     * @param string $urn
     * @param string $content
     */
    public function __construct(string $urn, string $content)
    {
        $this->path    = $this->title = $this->urn = $urn;
        $this->content = new Content($content);
        $this->nav     = new Navigation();
    }

    /**
     * @return bool
     */
    public function isRoot(): bool
    {
        return $this->urn === '';
    }

    /**
     * @return Navigation
     */
    public function getNavigation(): Navigation
    {
        return $this->nav;
    }

    /**
     * @param string $path
     * @return Documentation
     */
    public function in(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @param string $title
     * @return Documentation
     */
    public function rename(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $urn
     * @return Documentation
     */
    public function locatedIn(string $urn): self
    {
        $this->urn = $urn;

        return $this;
    }

    /**
     * @param Language $language
     * @return $this
     */
    public function withLanguage(Language $language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrn(): string
    {
        return $this->urn;
    }

    /**
     * @return Language
     */
    public function getLanguage(): Language
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return Content|string
     */
    public function getContent(): Content
    {
        return $this->content;
    }
}
