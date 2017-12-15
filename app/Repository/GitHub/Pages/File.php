<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\GitHub\Pages;

use App\Entity\Document;
use App\Entity\Page;
use App\Entity\Page\Type;
use App\Entity\Renderers\Renderer;
use App\Entity\Page\Renderer as Factory;
use App\Entity\Source;
use Github\Client;
use Illuminate\Support\Arr;
use Illuminate\Support\Fluent;
use Illuminate\Support\Str;

/**
 * Class File
 */
class File extends Fluent
{
    /**
     * Map of automatic detection of page types.
     * - The key matches the regular expression of the path to the file.
     * - The value is a type of page.
     */
    private const TYPE_MAPPINGS = [
        '^\.'            => Type::HIDDEN,
        '\.txt$'         => Type::HIDDEN,
        '^_sidebar\.md$' => Type::MENU,
    ];


    /**
     * @var Client
     */
    private $client;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $body;

    /**
     * @var Source
     */
    private $source;

    /**
     * File constructor.
     * @param Client $client
     * @param Source $source
     * @param array $data
     */
    public function __construct(Client $client, Source $source, array $data)
    {
        $this->client = $client;
        $this->source = $source;

        parent::__construct($data);
    }

    /**
     * @param Client $client
     * @param Source $source
     * @param string|null $path
     * @return \Generator|File[]
     */
    public static function all(Client $client, Source $source, string $path = null): \Traversable
    {
        $docs = $client->repo()
            ->contents()
            ->show(...$source->toConfigArray($path));

        foreach ($docs as $data) {
            if (Arr::get($data, 'type', 'dir') === 'dir') {
                yield from static::all($client, $source, $data['path'] ?? '');
            } else {
                $file = new File($client, $source, $data);

                yield $file->getPathname() => $file;
            }
        }
    }

    /**
     * @return string
     */
    public function getPathname(): string
    {
        $prefix = \trim($this->source->getPath(), '/');
        $path   = Str::replaceFirst($prefix, '', $this->getFullPathname());

        return \trim($path, '/');
    }

    /**
     * @return string
     */
    public function getFullPathname(): string
    {
        return (string)$this->get('path');
    }

    /**
     * @param Document $document
     * @param Factory $factory
     * @return Page
     * @throws \Github\Exception\ErrorException
     * @throws \Github\Exception\InvalidArgumentException
     */
    public function toPage(Document $document, Factory $factory): Page
    {
        $page = new Page($document, $this->getPathname(), $this->getHash());

        foreach (self::TYPE_MAPPINGS as $pattern => $type) {
            if (\preg_match(\sprintf('/%s/isu', $pattern), $this->getFilename())) {
                $page->setType($type);
                break;
            }
        }

        $page->rename($this->getTitle());
        $page->updateContent($factory->resolve($page), $this->getContents());

        return $page;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return (string)$this->get('sha');
    }

    /**
     * @return string
     * @throws \Github\Exception\ErrorException
     * @throws \Github\Exception\InvalidArgumentException
     */
    public function getContents(): string
    {
        if ($this->body === null) {
            $this->body = $this->read();
        }

        return $this->body;
    }

    /**
     * @return string
     * @throws \Github\Exception\ErrorException
     * @throws \Github\Exception\InvalidArgumentException
     */
    private function read(): string
    {
        $configs = $this->source->toConfigArray($this->getFullPathname());

        return (string)$this->client->repo()->contents()->download(...$configs);
    }

    /**
     * @return string
     * @throws \Github\Exception\ErrorException
     * @throws \Github\Exception\InvalidArgumentException
     */
    public function getTitle(): string
    {
        if ($this->title === null) {
            $this->title = $this->getTitleFromContents($this->getContents(), function (): string {
                return Str::title($this->getFilenameWithoutExtension());
            });
        }

        return $this->title;
    }

    /**
     * @param string $markdown
     * @param \Closure $otherwise
     * @return string
     */
    private function getTitleFromContents(string $markdown, \Closure $otherwise): string
    {
        $filter = function (string $title): string {
            $title = \str_replace(['-', '_', '+'], ' ', $title);

            return \trim($title);
        };

        preg_match_all('/^\s*#\s+(.*?)$/musi', $markdown, $matches);

        if (\count($matches[1])) {
            return $filter($matches[1][0]);
        }

        return $filter($otherwise());
    }

    /**
     * @return string
     */
    public function getFilenameWithoutExtension(): string
    {
        return \pathinfo($this->getFilename(), \PATHINFO_FILENAME);
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->get('name');
    }
}
