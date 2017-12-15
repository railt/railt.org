<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository;

use App\Mapping as ORM;
use App\Entity\Contributor;
use Serafim\Hydrogen\Repository\ObjectRepository;
use App\Repository\GitHub\Contributors as GitHub;
use App\Repository\Database\Contributors as Database;

/**
 * @ORM\Repository(entity=Contributor::class, classes={
 *     Database::class,
 *     GitHub::class,
 * })
 */
interface ContributorsRepository extends ObjectRepository
{
    /**
     * @param int $id
     * @return Contributor|null
     */
    public function findOneByGitHubId(int $id): ?Contributor;
}
