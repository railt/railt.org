<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Search;

use Illuminate\Contracts\Support\Arrayable;

/**
 * Class Result
 */
class Result implements ResultInterface, Arrayable
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $uri;

    /**
     * Result constructor.
     * @param string $title
     * @param string $content
     * @param string $uri
     */
    public function __construct(string $title, string $content, string $uri)
    {
        $this->title   = $title;
        $this->content = $content;
        $this->uri     = $uri;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title'   => $this->getTitle(),
            'uri'     => $this->getUri(),
            'content' => $this->getContent(),
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
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
