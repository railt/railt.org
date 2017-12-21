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
use App\Entity\Content\HasContent;
use App\Entity\Content\Renderable;
use App\Entity\Page\Status;
use App\Entity\Page\Type;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Str;

/**
 * @ORM\Entity()
 * @ORM\Table(name="pages")
 * @ORM\HasLifecycleCallbacks()
 */
class Page implements Renderable
{
    use HasContent;
    use Identifiable;
    use Timestampable;

    /**
     * Map of automatic transforming of page slugs (URL path).
     * - The key matches the regular expression of the source slug.
     * - The value is the replacement.
     */
    private const SLUG_MAPPINGS = [
        '^README$' => '',
    ];

    /**
     * @var Document
     * @ORM\ManyToOne(targetEntity=Document::class, inversedBy="pages", cascade={"persist"})
     * @ORM\JoinColumn(name="document_id", referencedColumnName="id")
     */
    private $document;

    /**
     * @var string
     * @ORM\Column(name="type", type="string")
     */
    private $type = Type::CONTENT;

    /**
     * @var string
     * @ORM\Column(name="hash", type="string")
     */
    private $hash;

    /**
     * @var string
     * @ORM\Column(name="path", type="string")
     */
    private $path;

    /**
     * @var string
     * @ORM\Column(name="slug", type="string")
     */
    private $slug;

    /**
     * @var string
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    /**
     * Page constructor.
     * @param Document $document
     * @param string $path
     * @param string $hash
     */
    public function __construct(Document $document, string $path, string $hash = '')
    {
        $this->path     = $path;
        $this->hash     = $hash;
        $this->document = $document;
        $this->title    = Str::title(\pathinfo($path, \PATHINFO_FILENAME));
        $this->content  = new Content('');

        $this->generateSlug();
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     * @return void
     */
    public function generateSlug(): void
    {
        $slug = \pathinfo($this->path, \PATHINFO_DIRNAME);

        if (! $this->isMenu()) {
            $slug .= '/' . \pathinfo($this->path, \PATHINFO_FILENAME);
        }

        $slug = \trim($slug, './');

        foreach (self::SLUG_MAPPINGS as $pattern => $replacement) {
            $slug = \preg_replace(\sprintf('/%s/isu', $pattern), $replacement, $slug);
        }

        $this->slug = $slug;
    }

    /**
     * @return bool
     */
    public function isMenu(): bool
    {
        return $this->type === Type::MENU;
    }

    /**
     * @param string $slug
     * @return \Traversable
     */
    public static function slugDepth(string $slug): \Traversable
    {
        $parts = static::slugParts($slug);

        while (\count($parts) > 0) {
            yield \implode('/', $parts);
            \array_pop($parts);
        }

        yield '';
    }

    /**
     * @param string $slug
     * @return array
     */
    public static function slugParts(string $slug): array
    {
        return \explode('/', $slug);
    }

    /**
     * @param string $name
     * @param Language|string $language
     * @return string
     * @throws \InvalidArgumentException
     */
    public function getRoute(string $name, $language): string
    {
        return \route($name, [
            'path' => $this->getSlug(),
            'lang' => $language instanceof Language ? $language->getCode() : $language,
        ], false);
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Page
     */
    public function setType(string $type): Page
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Page
     */
    public function rename(string $title): Page
    {
        $this->title = Str::ucfirst($title);

        return $this;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->type === Type::HIDDEN;
    }

    /**
     * @return bool
     */
    public function isBasicPage(): bool
    {
        return $this->type === Type::CONTENT;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param Page $page
     * @return int
     */
    public function compare(?Page $page): int
    {
        if ($page !== null && $page->isExisting()) {
            if ($page->getHash() === $this->getHash()) {
                return Status::ACTUAL;
            }

            return Status::OBSOLETE;
        }

        return Status::NOT_FOUND;
    }

    /**
     * @param Page $page
     * @return $this|Page
     */
    public function updateBy(Page $page): self
    {
        $this->title = $page->getTitle();
        $this->content = $page->getContent();
        $this->hash = $page->getHash();
        $this->type = $page->getType();

        return $this;
    }

    /**
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }
}
