<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Document;

/**
 * Class Navigation
 */
class Navigation implements \IteratorAggregate
{
    /**
     * @var string
     */
    public const INDEX_SLUG = 'slug';

    /**
     * @var string
     */
    public const INDEX_TITLE = 'title';

    /**
     * @var string
     */
    public const INDEX_LEVEL = 'level';

    /**
     * @var array
     */
    protected $value = [];

    /**
     * Navigation constructor.
     * @param array $navigation
     */
    public function __construct(array $navigation = [])
    {
        $this->value = $navigation;
    }

    /**
     * @param string $title
     * @param int $level
     */
    public function add(string $title, int $level = 1): void
    {
        $this->value[] = [
            self::INDEX_SLUG  => \str_slug(\strip_tags($title)),
            self::INDEX_TITLE => $title,
            self::INDEX_LEVEL => $level,
        ];
    }

    /**
     * @return \SplDoublyLinkedList
     */
    public function getIterator(): \SplDoublyLinkedList
    {
        $list = new \SplDoublyLinkedList();

        foreach ($this->value as $item) {
            $list->push($item);
        }

        return $list;
    }

    /**
     * @param iterable $navigation
     */
    public function update(iterable $navigation): void
    {
        $this->value = [];

        foreach ($navigation as [$title, $level]) {
            $this->add($title, $level);
        }
    }
}
