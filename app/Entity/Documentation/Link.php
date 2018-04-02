<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Documentation;

use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Str;

/**
 * Class Link
 */
class Link implements Jsonable, \JsonSerializable
{
    private const NAV_TITLE = 'title';
    private const NAV_LEVEL = 'level';
    private const NAV_SLUG = 'slug';

    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $level;

    /**
     * @var string
     */
    private $slug;

    /**
     * Link constructor.
     * @param string $title
     * @param int $level
     * @param string|null $slug
     */
    public function __construct(string $title, int $level = 1, string $slug = null)
    {
        $this->title = $title;
        $this->level = $level;
        $this->slug  = $slug ?? Str::slug($title);
    }

    /**
     * @param int $options
     * @return string
     */
    public function toJson($options = 0): string
    {
        return \json_encode($this->jsonSerialize(), $options);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            self::NAV_TITLE => $this->getTitle(),
            self::NAV_LEVEL => $this->getLevel(),
            self::NAV_SLUG  => $this->getSlug(),
        ];
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}
