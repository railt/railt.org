<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Common;

/**
 * Class Content
 */
class BaseContent
{
    /**
     * @var string
     */
    protected $original;

    /**
     * @var string
     */
    protected $rendered;

    /**
     * Content constructor.
     * @param string $content
     */
    public function __construct(string $content = '')
    {
        $this->original = $content;
    }

    /**
     * @param string $body
     */
    public function update(string $body): void
    {
        $this->rendered = $body;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->rendered ?? $this->getRawBody();
    }

    /**
     * @return string
     */
    public function getRawBody(): string
    {
        return $this->original;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getBody();
    }
}
