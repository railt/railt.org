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
use App\Entity\Common\Identifier;
use App\Entity\Language\Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Language
 * @ORM\Entity(repositoryClass=Repository::class)
 * @ORM\Table(name="languages")
 * @ORM\HasLifecycleCallbacks()
 */
class Language implements Identifiable
{
    use Identifier;

    /**
     * @ORM\Column(name="name")
     *
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(name="title")
     *
     * @var string
     */
    protected $title;

    /**
     * @ORM\OneToMany(targetEntity=Documentation::class, mappedBy="language", cascade={"persist"})
     * @ORM\JoinColumn(name="id", referencedColumnName="language_id")
     *
     * @var Documentation[]|Collection
     */
    protected $docs;

    /**
     * Language constructor.
     * @param string $name
     * @param string $title
     */
    public function __construct(string $name, string $title)
    {
        $this->docs  = new ArrayCollection();
        $this->name  = $name;
        $this->title = $title;
    }

    /**
     * @return Collection|Documentation[]
     */
    public function getDocumentations(): Collection
    {
        return $this->docs;
    }

    /**
     * @return string
     */
    public function getNameIdentifier(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function rename(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @param string $newName
     */
    public function move(string $newName): void
    {
        $this->id = $newName;
    }
}
