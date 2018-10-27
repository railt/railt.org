<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Renderer;

use Renderer\Hook\HookInterface;

/**
 * Class BaseRenderer
 */
abstract class BaseRenderer implements RendererInterface
{
    /**
     * @var array|HookInterface[]
     */
    private $hooks = [];

    /**
     * @param HookInterface $hook
     */
    public function addHook(HookInterface $hook): void
    {
        $this->hooks[] = $hook;
    }

    /**
     * @param string $original
     * @return string
     */
    protected function before(string $original): string
    {
        foreach ($this->hooks as $hook) {
            $original = $hook->before($original);
        }

        return $original;
    }

    /**
     * @param string $rendered
     * @return string
     */
    protected function after(string $rendered): string
    {
        /** @var HookInterface[] $hooks */
        $hooks = \array_reverse($this->hooks);

        foreach ($hooks as $hook) {
            $rendered = $hook->after($rendered);
        }

        return $rendered;
    }

    /**
     * @param string $content
     * @return ResultInterface
     */
    public function render(string $content): ResultInterface
    {
        $result = $this->exec($this->before($content));

        $result->update($this->after($result->getContent()));

        return $result;
    }

    /**
     * @param string $content
     * @return ResultInterface
     */
    abstract protected function exec(string $content): ResultInterface;
}
