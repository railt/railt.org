<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\Database;

use App\Entity\Contributor;
use Serafim\Hydrogen\Query\Proxy;
use Serafim\Hydrogen\Query\Builder;
use App\Repository\ContributorsRepository;
use Serafim\Hydrogen\Repository\DatabaseRepository;

/**
 * @method Builder|Proxy|$this inRandomOrder()
 */
class Contributors extends DatabaseRepository implements ContributorsRepository
{
    /**
     * @param int $id
     * @return object|null|Contributor
     * @throws \LogicException
     */
    public function findOneByGitHubId(int $id): ?Contributor
    {
        return $this->query->where('gitHubId', $id)->first();
    }

    /**
     * @param Builder $query
     * @return Builder
     * @throws \LogicException
     */
    public function scopeInRandomOrder(Builder $query): Builder
    {
        return $query->select('RAND() as HIDDEN rnd')->orderBy('this.rnd');
    }
}
