<?php

declare(strict_types=1);

namespace App\Domain\Documentation\Menu;

use App\Domain\Documentation\Menu;
use App\Domain\Documentation\Page;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class PageLink extends Link
{
    #[ORM\ManyToOne(targetEntity: Page::class, cascade: ['ALL'], inversedBy: 'links')]
    #[ORM\JoinColumn(name: 'page_id', referencedColumnName: 'id')]
    private Page $page;

    public function __construct(
        Page $page,
        Menu $menu,
        string $title,
        LinkId $id = null,
    ) {
        parent::__construct($menu, $title, $page->getUrl(), $id);

        $this->page = $page;

        $page->addLink($this);
    }

    public function getPage(): Page
    {
        return $this->page;
    }
}
