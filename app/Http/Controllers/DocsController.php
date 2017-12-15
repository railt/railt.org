<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entity\Language;
use App\Entity\Page;
use App\Repository\Database\Pages;
use App\Repository\PagesRepository;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class DocsController
 */
class DocsController
{
    /**
     * @var Language
     */
    private $language;

    /**
     * @var PagesRepository|Pages
     */
    private $pages;

    /**
     * DocsController constructor.
     * @param Language $language
     * @param PagesRepository $pages
     */
    public function __construct(Language $language, PagesRepository $pages)
    {
        $this->language = $language;
        $this->pages    = $pages;
    }

    /**
     * @param string $lang
     * @param string $path
     * @return View
     * @throws NotFoundHttpException
     * @throws \LogicException
     */
    public function show(string $lang, string $path = ''): View
    {
        $pages = $this->pages->findPagesBySlug($this->language, $path);

        /** @var Page $page */
        $page = $pages->last();

        if ($pages->count() === 0 || $page->getSlug() !== $path) {
            throw new NotFoundHttpException('Page ' . $path . ' not found');
        }

        $menus = $this->pages->findMenusBySlug($this->language, $path);
        /** @var Page $menu */
        $menu = $menus->last();


        return \view('pages.docs', [
            'page'  => $page,
            'pages' => $pages,
            'menu'  => $menu,
            'menus' => $menus,
        ]);
    }
}
