<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Documentation;

use App\Entity\Documentation;
use App\Entity\Repository\ProvidesDocumentation;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class DocumentationReader
 */
class Reader
{
    private const INDEX_FILE_NAME = 'readme';
    private const PATTERN_TITLE = '/^#([^\n]+)$/ium';

    /**
     * @var ProvidesDocumentation
     */
    private $docs;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $title;

    /**
     * Reader constructor.
     * @param ProvidesDocumentation $docs
     * @param string $path
     * @param string $content
     */
    public function __construct(ProvidesDocumentation $docs, string $path, string $content)
    {
        $this->path = $path;
        $this->docs = $docs;

        $this->name    = $this->extractName($path);
        $this->title   = $this->extractTitle($content);
        $this->content = $this->formatContent($content);
    }

    /**
     * @param string $path
     * @return string
     */
    private function extractName(string $path): string
    {
        $name = \array_first(\explode('.', \basename($path)));

        if (Str::lower($name) === self::INDEX_FILE_NAME) {
            return '';
        }

        return Str::slug($name);
    }

    /**
     * @param string $content
     * @return null|string
     */
    private function extractTitle(string $content): ?string
    {
        \preg_match(self::PATTERN_TITLE, $content, $matches);

        return $matches[1] ?? null;
    }

    /**
     * @param string $content
     * @return string
     */
    private function formatContent(string $content): string
    {
        return \trim($content);
    }

    /**
     * @param ProvidesDocumentation $docs
     * @param SplFileInfo $info
     * @return Reader
     */
    public static function fromSplFileInfo(ProvidesDocumentation $docs, SplFileInfo $info): Reader
    {
        $path = $info->getRelativePathname();

        return new static($docs, $path, \file_get_contents($info->getPathname()));
    }

    /**
     * @return Documentation
     */
    public function toDocumentation(): Documentation
    {
        $urn = $this->extractUrn($this->path, $this->name);

        $document = $this->docs->findByPath($this->path) ??
            new Documentation($urn, $this->content);

        $document->in($this->path);
        $document->locatedIn($urn);
        $document->rename($this->title);
        $document->touch();

        $document->getContent()->update($this->content);

        return $document;
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

        return \implode('/', \array_merge($parts, [$name]));
    }
}
