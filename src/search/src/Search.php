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
 * Class Search
 */
class Search implements SearchInterface
{
    /**
     * @var SearchInterface[]
     */
    private $repositories;

    /**
     * Search constructor.
     * @param SearchInterface[] $repositories
     */
    public function __construct(SearchInterface ...$repositories)
    {
        $this->repositories = $repositories;
    }

    /**
     * @param Language $language
     * @param string $query
     * @param int $results
     * @return iterable|ResultInterface[]
     */
    public function search(Language $language, string $query, int $results): iterable
    {
        $count = 0;

        foreach ($this->repositories as $repository) {
            foreach ($repository->search($language, $query, $results) as $result) {
                if ($count++ === $results) {
                    break 2;
                }

                yield $result;
            }
        }
    }
}
