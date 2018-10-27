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
 * Interface PageInterface
 */
interface PageInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getLanguage(): string;

    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @return string
     */
    public function getUrn(): string;

    /**
     * @return string
     */
    public function getHash(): string;

    /**
     * @return string
     */
    public function getContents(): string;
}
