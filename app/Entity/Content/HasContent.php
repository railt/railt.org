<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Content;

use App\Entity\Content;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Renderers\Renderer;

/**
 * Trait HasContent
 */
trait HasContent
{
    /**
     * @var Content
     * @ORM\Embedded(class=Content::class, columnPrefix="content_")
     */
    protected $content;

    /**
     * @return Content
     */
    public function getContent(): Content
    {
        return $this->content;
    }

    /**
     * @param Renderer $renderer
     * @param string|null $content
     * @return void
     */
    public function updateContent(Renderer $renderer, string $content = null): void
    {
        $this->content->update($renderer, $content);
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->content->getRendered();
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return !\trim($this->content->getOriginal());
    }
}
