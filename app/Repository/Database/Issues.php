<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\Database;

use App\Entity\Issue;
use App\Repository\IssuesRepository;
use Serafim\Hydrogen\Query\Builder;
use Serafim\Hydrogen\Repository\DatabaseRepository;

/**
 * Class Issues
 */
class Issues extends DatabaseRepository implements IssuesRepository
{
    /**
     * @param string $url
     * @return Issue|null|object
     * @throws \LogicException
     */
    public function findOneByUrl(string $url): ?Issue
    {
        return $this->query()->where('url', $url)->first();
    }

    /**
     * @param Builder $query
     * @return Builder
     * @throws \LogicException
     */
    protected function scope(Builder $query): Builder
    {
        return $query->latest('updatedAt');
    }
}
