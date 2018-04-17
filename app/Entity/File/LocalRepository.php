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
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class LocalRepository
 */
class LocalRepository implements ContainsFiles
{
    /**
     * @return \Traversable|File[]
     * @throws \LogicException
     * @throws \RuntimeException
     */
    public function getFiles(): \Traversable
    {
        /** @var SplFileInfo $file */
        foreach ($this->read() as $file) {
            yield new File($file->getRelativePathname(), $file->getContents());
        }
    }

    /**
     * @return string
     */
    private function getDirectory(): string
    {
        return \resource_path(self::STORAGE_DIRECTORY);
    }

    /**
     * @return \Traversable
     * @throws \InvalidArgumentException
     */
    private function read(): \Traversable
    {
        return (new Finder())
            ->files()
            ->name('*.md')
            ->in($this->getDirectory());
    }
}
