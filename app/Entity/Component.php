<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Common\Identifiable;
use App\Entity\Common\Timestampable;
use Doctrine\Common\Collections\ArrayCollection;
use Serafim\Hydrogen\Collection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Str;

/**
 * @ORM\Entity
 * @ORM\Table(name="components")
 * @ORM\HasLifecycleCallbacks()
 */
class Component
{
    use Identifiable;
    use Timestampable;

    private const LATEST_RELEASE_OFFSET = 0;
    private const PENULTIMATE_RELEASE_OFFSET = 1;


    /**
     * @var string
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    /**
     * @var Source
     * @ORM\ManyToOne(targetEntity=Source::class)
     * @ORM\JoinColumn(name="source_id", referencedColumnName="id")
     */
    private $source;

    /**
     * @var Release[]|\Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity=Release::class, mappedBy="component")
     * @ORM\OrderBy({"version" = "DESC"})
     */
    private $releases;

    /**
     * Component constructor.
     * @param Source $source
     * @param string|null $title
     */
    public function __construct(Source $source, string $title = null)
    {
        $this->source = $source;
        $this->title = $title ?? Str::title($source->getName());
    }

    /**
     * @return Collection
     */
    public function getReleases(): Collection
    {
        return Collection::make(
            $this->releases ?? ($this->releases = new ArrayCollection())
        );
    }

    /**
     * @param int $offset
     * @return Release|null
     */
    public function getRelease(int $offset = 0): ?Release
    {
        $i = 0;

        return $this->getReleases()->first(function() use ($offset, &$i): bool {
            return $i++ >= $offset;
        });
    }

    /**
     * @return Release|null
     */
    public function getLatestRelease(): ?Release
    {
        return $this->getRelease(self::LATEST_RELEASE_OFFSET);
    }

    /**
     * @return Release|null
     */
    public function getPenultimateRelease(): ?Release
    {
        return $this->getRelease(self::PENULTIMATE_RELEASE_OFFSET);
    }

    /**
     * @return bool
     */
    public function hasReleases(): bool
    {
        return $this->getReleases()->isNotEmpty();
    }

    /**
     * @return bool
     */
    public function hasPenultimateRelease(): bool
    {
        return $this->getReleases()->count() > self::PENULTIMATE_RELEASE_OFFSET;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return Source
     */
    public function getSource(): Source
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->title;
    }
}
