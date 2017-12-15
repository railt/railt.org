<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Source;
use App\Mapping as ORM;
use Serafim\Hydrogen\Repository\ObjectRepository;
use App\Repository\Database\Sources as Database;

/**
 * @ORM\Repository(entity=Source::class, classes={
 *      Database::class,
 * })
 */
interface SourcesRepository extends ObjectRepository
{
    /**
     * @param string $type
     * @return iterable|Source[]
     */
    public function findByType(string $type): iterable;

    /**
     * @param string $user
     * @param string $repo
     * @return Source|null
     */
    public function findOneByUserAndName(string $user, string $repo): ?Source;
}
