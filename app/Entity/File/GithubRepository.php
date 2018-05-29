<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\File;

use App\Entity\File;
use Github\Api\Repository\Contents;
use Github\Client;
use Illuminate\Support\Str;

/**
 * Class GithubRepository
 */
class GithubRepository implements ContainsFiles
{
    public const GITHUB_USERNAME   = 'railt';
    public const GITHUB_REPOSITORY = 'docs';
    public const GITHUB_BRANCH     = '1.2';

    private const ALLOWED_EXTENSIONS = ['.md'];

    /**
     * @var Client
     */
    private $client;

    /**
     * GithubRepository constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    protected function getBranch(): string
    {
        return (string)\config('app.version', self::GITHUB_BRANCH);
    }

    /**
     * @return \Traversable|File[]
     * @throws \Github\Exception\InvalidArgumentException
     * @throws \Github\Exception\ErrorException
     */
    public function getFiles(): \Traversable
    {
        yield from $this->list();
    }

    /**
     * @param string|null $path
     * @return \Traversable|File[]
     * @throws \Github\Exception\InvalidArgumentException
     * @throws \Github\Exception\ErrorException
     */
    private function list(string $path = null): \Traversable
    {
        $items = $this->repo()->show(...$this->config($path ?? ''));

        foreach ($items as $item) {
            if ($item['type'] === 'dir') {
                yield from $this->list($item['path']);
            }

            if ($item['type'] === 'file' && $this->filter($item['name'])) {
                yield new File($item['path'], $this->read($item['path']));
            }
        }
    }

    /**
     * @return Contents
     */
    private function repo(): Contents
    {
        return $this->client->repository()->contents();
    }

    /**
     * @param string $path
     * @return array
     */
    private function config(string $path): array
    {
        return [
            self::GITHUB_USERNAME,
            self::GITHUB_REPOSITORY,
            $path,
            $this->getBranch(),
        ];
    }

    /**
     * @param string $path
     * @return bool
     */
    private function filter(string $path): bool
    {
        return Str::endsWith($path, self::ALLOWED_EXTENSIONS);
    }

    /**
     * @param string $path
     * @return string
     * @throws \Github\Exception\InvalidArgumentException
     * @throws \Github\Exception\ErrorException
     */
    private function read(string $path): string
    {
        return (string)$this->repo()->download(...$this->config($path));
    }
}
