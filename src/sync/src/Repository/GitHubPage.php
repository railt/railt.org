<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Sync\Repository;

/**
 * Class Page
 */
class GitHubPage implements PageInterface
{
    /**
     * @var string
     */
    private const ROOT_PAGE_NAME = 'README';

    /**
     * @var string
     */
    private $hash;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $lang;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Closure
     */
    private $stream;

    /**
     * @var string
     */
    private $content;

    /**
     * Page constructor.
     * @param string $pathname
     * @param string $hash
     * @param \Traversable $contentStream
     */
    public function __construct(string $pathname, string $hash, \Traversable $contentStream)
    {
        $this->parsePathname($pathname);

        $this->hash = $hash;
        $this->stream = $contentStream;
    }

    /**
     * @param string $pathname
     */
    private function parsePathname(string $pathname): void
    {
        $pattern = '/^(?<path>[\w_\-\/]*?)(?<name>[\w_\-]+)\.(?<lang>\w+)\.md$/iu';

        \preg_match($pattern, $pathname, $matches);

        $this->path = \trim($matches['path'] ?? '', '/');
        $this->name = $matches['name'] ?? '';
        $this->lang = $matches['lang'] ?? '';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->lang;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getUrn(): string
    {
        return \implode('/', \array_filter([$this->getPath(), $this->getName()]));
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        if ($this->content === null) {
            $this->content = '';

            foreach ($this->stream as $chunk) {
                $this->content .= $chunk;
            }
        }

        return $this->content;
    }
}
