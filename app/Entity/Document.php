<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Common\BaseContent;
use App\Entity\Common\Identifiable;
use App\Entity\Common\Identifier;
use App\Entity\Common\ProvidesContent;
use App\Entity\Common\Timestampable;
use App\Entity\Common\Timestamps;
use App\Entity\Document\Content;
use App\Entity\Document\Navigation;
use Renderer\RendererInterface;

/**
 * Class Document
 */
class Document implements
    Identifiable,
    Timestampable,
    ProvidesContent
{
    use Identifier;
    use Timestamps;

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var Language
     */
    protected $language;

    /**
     * @var Navigation
     */
    protected $navigation;

    /**
     * @var Urn
     */
    protected $urn;

    /**
     * @var string
     */
    protected $hash = '';

    /**
     * @var Content
     */
    protected $content;

    /**
     * @var Menu|null
     */
    protected $menu;

    /**
     * Document constructor.
     * @param Language $language
     */
    public function __construct(Language $language)
    {
        $this->language = $language;
        $this->content = new Content();
        $this->navigation = new Navigation();
        $this->urn = new Urn();

        $this->actualize();
    }

    /**
     * @param string $urn
     * @return Document
     */
    public function moveTo(string $urn): Document
    {
        $this->urn->update($urn);

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return (string)$this->title;
    }

    /**
     * @return Language
     */
    public function getLanguage(): Language
    {
        return $this->language;
    }

    /**
     * @return Navigation
     */
    public function getNavigation(): Navigation
    {
        return $this->navigation;
    }

    /**
     * @return string
     */
    public function getUrn(): string
    {
        return \str_replace(Menu::ROOT_MENU_ITEM, '', $this->urn->getValue());
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return (string)$this->hash;
    }

    /**
     * @param string $content
     * @param string|null $hash
     * @return Document
     */
    public function update(string $content, string $hash = null): Document
    {
        $this->content = new Content($content);
        $this->hash = $hash ?? $this->hash;

        return $this;
    }

    /**
     * @return iterable
     */
    public function getBreadcrumbs(): iterable
    {
        $menu = $this->menu;
        $result = [];

        do {
            $result[$menu->getTitle()] = $menu->getUrn();
            $menu = $menu->getParent();
        } while ($menu);

        return \array_reverse($result);
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

        $this->title = $result->getTitle() ?: $this->title;
        $this->content->update($result->getContent());

        $this->navigation->update($result->getNavigation());
    }
}
