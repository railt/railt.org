<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Component;
use App\Entity\Release;
use App\Mapping as ORM;
use App\Repository\Database\Releases as Database;
use App\Repository\GitHub\Releases as GitHub;
use Serafim\Hydrogen\Collection;
use Serafim\Hydrogen\Repository\ObjectRepository;

/**
 * @ORM\Repository(entity=Release::class, classes={
 *      Database::class,
 *      GitHub::class,
 * })
 */
interface ReleasesRepository extends ObjectRepository
{
    /**
     * @param Component $component
     * @return Release[]|Collection
     */
    public function findByComponent(Component $component): Collection;

    /**
     * @param Component $component
     * @param string $version
     * @return Release|null
     */
    public function findOneByVersion(Component $component, string $version): ?Release;
}
