<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Article;

/**
 * Class Image
 */
class Image
{
    /**
     * @var string
     */
    protected $value;

    /**
     * Image constructor.
     * @param string $url
     */
    public function __construct(string $url = '')
    {
        $this->value = $url;
    }

    /**
     * @param string $urn
     * @return Image
     */
    public function update(string $urn): Image
    {
        $this->value = $urn;

        return $this;
    }

    /**
     * @return string
     * @throws \LogicException
     */
    public function getUrl(): string
    {
        return \asset_ts('storage/' . $this->value);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getUrl();
    }
}
