<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Issue;
use App\Mapping as ORM;
use App\Repository\GitHub\Issues as GitHub;
use App\Repository\Database\Issues as Database;
use Serafim\Hydrogen\Repository\ObjectRepository;

/**
 * @ORM\Repository(entity=Issue::class, classes={
 *      Database::class,
 *      GitHub::class,
 * })
 */
interface IssuesRepository extends ObjectRepository
{
    /**
     * @param string $url
     * @return Issue|null
     */
    public function findOneByUrl(string $url): ?Issue;
}
