<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Article\Content;
use App\Entity\Article\Image;
use App\Entity\Common\BaseContent;
use App\Entity\Common\Identifiable;
use App\Entity\Common\Identifier;
use App\Entity\Common\ProvidesContent;
use App\Entity\Common\Timestampable;
use App\Entity\Common\Timestamps;
use Illuminate\Support\Str;
use Renderer\RendererInterface;

/**
 * Class Article
 */
class Article implements
    Identifiable,
    Timestampable,
    ProvidesContent
{
    use Identifier;
    use Timestamps;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $urn = '';

    /**
     * @var Image
     */
    protected $preview;

    /**
     * @var Content
     */
    protected $content;

    /**
     * Article constructor.
     * @param string $title
     * @param string $content
     */
    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->urn = \str_slug($title);
        $this->content = new Content($content);
        $this->preview = new Image();

        $this->actualize();
    }

    /**
     * @return string
     */
    public function getPreviewText(): string
    {
        $text = $this->getContent()->getBody();
        $text = \strip_tags($text);

        return Str::words($text, 60);
    }

    /**
     * @return Image
     */
    public function getPreview(): Image
    {
        return $this->preview;
    }

    /**
     * @param string $title
     */
    public function rename(string $title): void
    {
        $this->title = $title;
        $this->urn = \str_slug($title);
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
    public function getUrn(): string
    {
        return $this->urn;
    }

    /**
     * @return Content
     */
    public function getContent(): BaseContent
    {
        return $this->content;
    }

    /**
     * @param RendererInterface $renderer
     */
    public function render(RendererInterface $renderer): void
    {
        $result = $renderer->render($this->content->getRawBody());
        $this->content->update($result->getContent());
    }
}
