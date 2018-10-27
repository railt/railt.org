<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Search;

use App\Entity\Language;

/**
 * Interface SearchInterface
 */
interface SearchInterface
{
    /**
     * @param Language $language
     * @param string $query
     * @param int $results
     * @return iterable|ResultInterface[]
     */
    public function search(Language $language, string $query, int $results): iterable;
}
