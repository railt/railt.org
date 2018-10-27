<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Renderer;

/**
 * Class Result
 */
class Result implements ResultInterface
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var iterable
     */
    private $navigation = [];

    /**
     * Result constructor.
     * @param string $body
     * @param iterable $navigation
     */
    public function __construct(string $body, iterable $navigation)
    {
        $this->body = $body;
        $this->title = $this->bootNavigation($navigation);
    }

    /**
     * @param iterable $navigation
     * @return null|string
     */
    private function bootNavigation(iterable $navigation): ?string
    {
        $title = null;

        foreach ($navigation as [$body, $level]) {
            if ($level === 1 && $title === null) {
                $title = $body;
                continue;
            }

            $level = \max(1, $level);
            $this->navigation[] = [$body, $level];
        }

        return $title;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title ?? '';
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->body;
    }

    /**
     * @param string $content
     */
    public function update(string $content): void
    {
        $this->body = $content;
    }

    /**
     * @return iterable|array[]
     */
    public function getNavigation(): iterable
    {
        return $this->navigation;
    }
}
