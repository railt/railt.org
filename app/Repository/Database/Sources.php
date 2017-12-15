<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\Database;

use App\Entity\Source;
use Serafim\Hydrogen\Repository\DatabaseRepository;
use App\Repository\SourcesRepository as SourcesRepositoryInterface;

/**
 * Class SourcesDBRepository
 */
class Sources extends DatabaseRepository implements SourcesRepositoryInterface
{
    /**
     * @param string $type
     * @return iterable
     * @throws \LogicException
     */
    public function findByType(string $type): iterable
    {
        return $this->query()->where('type', $type)->get();
    }

    /**
     * @param string $user
     * @param string $repo
     * @return Source|null|object
     * @throws \LogicException
     */
    public function findOneByUserAndName(string $user, string $repo): ?Source
    {
        return $this->query()
            ->where('user', $user)
            ->where('name', $repo)
            ->first();
    }
}
