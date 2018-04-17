<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Documentation\FindableByPath;
use App\Entity\Language\FindableByName;
use App\Entity\Menu\FindableByUrn;
use Illuminate\Support\Str;

/**
 * Class File
 */
class File
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string
     */
    private $urn;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $pathName;

    /**
     * File constructor.
     * @param string $relativePathName
     * @param string $content
     */
    public function __construct(string $relativePathName, string $content)
    {
        $this->name  = $this->extractName($relativePathName);
        $this->urn   = $this->extractUrn($relativePathName, $this->name);
        $this->title = $this->extractTitle($content);

        $this->content  = \trim($content);
        $this->pathName = $relativePathName;
    }

    /**
     * @param FindableByName $languages
     * @return Language
     */
    public function getLanguage(FindableByName $languages): Language
    {
        \preg_match('/.*?\.([a-z]+)\.md$/', $this->pathName, $matches);

        $locale = Str::lower(\trim($matches[1])) ?? \config('app.locale');

        return $languages->findByName($locale) ?? new Language($locale, $locale);
    }

    /**
     * @param FindableByPath $docs
     * @return Documentation
     */
    public function getDocumentation(FindableByPath $docs): Documentation
    {
        $document = $docs->findByPath($this->pathName) ?? new Documentation($this->urn, $this->content);

        $document->in($this->pathName);
        $document->locatedIn($this->urn);

        if ($this->title) {
            $document->rename($this->title);
        }

        $document->touch();
        $document->getContent()->update($this->content);

        return $document;
    }

    /**
     * @param FindableByUrn $menus
     * @return \Traversable|Menu[]
     */
    public function getMenus(FindableByUrn $menus): \Traversable
    {
        [$parts, $child] = [\explode('/', $this->urn), null];

        do {
            $urn = \implode('/', $parts) ?: '/';
            $current = $menus->findByUrn($urn) ?? new Menu(Str::title($urn), $urn);

            yield $child ? $current->attach($child) : $current;
        } while (\array_pop($parts) && $child = $current);
    }

    /**
     * @param string $path
     * @return string
     */
    private function extractName(string $path): string
    {
        $name = \array_first(\explode('.', \basename($path)));

        return $this->isIndex($name) ? '' : Str::slug($name);
    }

    /**
     * @param string $name
     * @return bool
     */
    private function isIndex(string $name): bool
    {
        return Str::lower($name) === 'readme';
    }

    /**
     * @param string $path
     * @param string $name
     * @return string
     */
    private function extractUrn(string $path, string $name): string
    {
        $parts = \explode('/', \str_replace('\\', '/', $path));
        \array_pop($parts);

        return \implode('/', \array_merge($parts, [$name])) ?: '/';
    }

    /**
     * @param string $content
     * @return null|string
     */
    private function extractTitle(string $content): ?string
    {
        \preg_match('/^#([^\n]+)$/ium', $content, $matches);

        return \trim($matches[1] ?? '') ?: null;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getUrn(): string
    {
        return $this->urn;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getRelativePathName(): string
    {
        return $this->pathName;
    }
}
