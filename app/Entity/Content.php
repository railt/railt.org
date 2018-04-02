<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Content
 * @ORM\Embeddable()
 */
class Content
{
    /**
     * @var string
     * @ORM\Column(name="rendered", type="text")
     */
    protected $rendered;

    /**
     * @var string
     * @ORM\Column(name="original", type="text")
     */
    protected $original;

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
    public function __toString(): string
    {
        return $this->toHtml();
    }

    /**
     * @return string
     */
    public function toHtml(): string
    {
        return $this->rendered;
    }

    /**
     * @param string $original
     * @return Content
     */
    public function update(string $original): Content
    {
        $this->rendered = $this->original = $original;

        return $this;
    }

    /**
     * @param Renderer $renderer
     */
    public function render(Renderer $renderer): void
    {
        $this->rendered = $renderer->render($this->original);
    }
}
