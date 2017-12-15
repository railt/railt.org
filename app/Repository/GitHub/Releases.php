<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\GitHub;

use App\Entity\Release;
use App\Entity\Component;
use Serafim\Hydrogen\Collection;
use App\Repository\ReleasesRepository;

/**
 * Class Releases
 */
class Releases extends GitHubRepository implements ReleasesRepository
{
    /**
     * @param Component $component
     * @param string $version
     * @return Release|null
     */
    public function findOneByVersion(Component $component, string $version): ?Release
    {
        return $this->findByComponent($component)
            ->first(function (Release $release) use ($version): bool {
                return $release->getVersion() === $version;
            });
    }

    /**
     * @param Component $component
     * @return Collection|Release[]
     */
    public function findByComponent(Component $component): Collection
    {
        return Collection::make($this->loadReleases($component));
    }

    /**
     * @param Component $component
     * @return \Traversable|Release[]
     */
    private function loadReleases(Component $component): \Traversable
    {
        $source = $component->getSource();

        $releases = $this->github->repo()
            ->releases()
            ->all($source->getUser(), $source->getName());

        foreach ($releases as $data) {
            $release = new Release($component, $data['tag_name'], $data['body']);
            $release->updateContent($this->renderer);

            yield $release;
        }
    }
}
