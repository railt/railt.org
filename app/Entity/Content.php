<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Renderers\Renderer;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class Content
{
    /**
     * @var string
     * @ORM\Column(name="original", type="text")
     */
    private $original;

    /**
     * @var string
     * @ORM\Column(name="rendered", type="text")
     */
    private $rendered;

    /**
     * Content constructor.
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->original = $this->rendered = $content;
    }

    /**
     * @return string
     */
    public function getOriginal(): string
    {
        return $this->original;
    }

    /**
     * @return string
     */
    public function getRendered(): string
    {
        return $this->rendered;
    }

    /**
     * @param Renderer $renderer
     * @param string $content
     * @return void
     */
    public function update(Renderer $renderer, string $content = null): void
    {
        if ($content !== null) {
            $this->original = $content;
        }

        $this->rendered = $renderer->render($this->original);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getRendered();
    }
}
