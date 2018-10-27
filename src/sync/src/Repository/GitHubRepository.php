<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Sync\Repository;

use Github\Api\Repository\Contents;
use GrahamCampbell\GitHub\GitHubManager;
use Traversable;

/**
 * Class GitHubRepository
 */
class GitHubRepository implements RepositoryInterface
{
    /**
     * @var string
     */
    public const DEFAULT_BRANCH = 'master';

    /**
     * @var string[]
     */
    private const ALLOWED_EXTENSIONS = [
        '.md'
    ];

    /**
     * @var GitHubManager
     */
    private $github;

    /**
     * @var string
     */
    private $repository;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $branch = self::DEFAULT_BRANCH;

    /**
     * Loader constructor.
     * @param GitHubManager $github
     * @param string $user
     * @param string $repository
     */
    public function __construct(GitHubManager $github, string $user, string $repository)
    {
        $this->github     = $github;
        $this->repository = $repository;
        $this->user       = $user;
    }

    /**
     * @param string|null $path
     * @return iterable
     */
    private function getFileTree(string $path = null): iterable
    {
        $items = $this->getFiles($path);

        foreach ($items as $item) {
            if ($item['type'] === 'dir') {
                yield from $this->getFileTree($item['path']);
            }

            if ($item['type'] === 'file' && $this->filter($item['name'])) {
                yield $item;
            }
        }
    }

    /**
     * @param string|null $path
     * @return iterable
     */
    private function getFiles(string $path = null): iterable
    {
        return $this->repository()->show($this->user, $this->repository, $path, $this->branch);
    }

    /**
     * @param string $path
     * @return bool
     */
    private function filter(string $path): bool
    {
        return \ends_with($path, self::ALLOWED_EXTENSIONS);
    }

    /**
     * @return iterable|PageInterface[]
     * @throws \Github\Exception\ErrorException
     * @throws \Github\Exception\InvalidArgumentException
     */
    private function read(): iterable
    {
        foreach($this->getFileTree() as $item) {
            yield new GitHubPage($item['path'], $item['sha'], $this->getFileContents($item['path']));
        }
    }

    /**
     * @param string $path
     * @return \Generator
     * @throws \Github\Exception\ErrorException
     * @throws \Github\Exception\InvalidArgumentException
     */
    private function getFileContents(string $path): \Generator
    {
        yield (string)$this->repository()->download(
            $this->user, $this->repository, $path, $this->branch
        );
    }

    /**
     * @return Contents
     */
    private function repository(): Contents
    {
        return $this->github->repository()->contents();
    }

    /**
     * @return \Generator|PageInterface[]
     */
    public function getIterator()
    {
        yield from $this->read();
    }
}
