<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\Database;

use App\Entity\Release;
use App\Entity\Component;
use Serafim\Hydrogen\Collection;
use App\Repository\ReleasesRepository;
use Serafim\Hydrogen\Repository\DatabaseRepository;

/**
 * Class Releases
 */
class Releases extends DatabaseRepository implements ReleasesRepository
{
    /**
     * @param Component $component
     * @return Collection|Release[]
     * @throws \LogicException
     */
    public function findByComponent(Component $component): Collection
    {
        return $this->query()->where('component', $component)->get();
    }

    /**
     * @param Component $component
     * @param string $version
     * @return Release|null|object
     * @throws \LogicException
     */
    public function findOneByVersion(Component $component, string $version): ?Release
    {
        return $this->query()
            ->where('component', $component)
            ->where('version', $version)
            ->first();
    }
}
