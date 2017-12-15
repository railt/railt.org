<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\Database;

use Serafim\Hydrogen\Query\Builder;
use Serafim\Hydrogen\Repository\DatabaseRepository;
use App\Repository\ComponentsRepository as ComponentsRepositoryInterface;

/**
 * Class ComponentsDBRepository
 */
class Components extends DatabaseRepository implements ComponentsRepositoryInterface
{
    /**
     * @param Builder $query
     * @return Builder
     * @throws \LogicException
     */
    protected function scope(Builder $query): Builder
    {
        return $query->with('releases');
    }
}
