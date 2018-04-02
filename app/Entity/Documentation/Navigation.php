<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Documentation;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Navigation
 * @ORM\Embeddable()
 */
class Navigation implements \IteratorAggregate
{
    /**
     * @ORM\Column(name="nav", type="json_array")
     * @var array
     */
    protected $nav = [];

    /**
     * @param string $title
     * @param int $level
     * @return Navigation
     */
    public function addLink(string $title, int $level = 1): Navigation
    {
        $this->nav[] = new Link($title, $level);

        return $this;
    }

    /**
     * @param iterable $links
     * @return Navigation
     */
    public function setLinks(iterable $links): Navigation
    {
        $this->nav = [];

        foreach ($links as $title => $link) {
            if ($link instanceof Link) {
                $this->nav[] = $link;
            } else {
                $this->nav[] = new Link($title, $link);
            }
        }

        return $this;
    }

    /**
     * @return \Traversable|Link[]
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->nav);
    }
}
