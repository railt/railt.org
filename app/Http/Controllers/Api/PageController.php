<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Entity\Language;
use App\Entity\Page;
use App\Repository\Database\Pages;
use App\Repository\PagesRepository;
use Railt\Routing\Contracts\InputInterface;

/**
 * Class PageController
 */
class PageController
{
    /**
     * @var PagesRepository|Pages
     */
    private $pages;

    /**
     * PageController constructor.
     * @param Pages $pages
     */
    public function __construct(Pages $pages)
    {
        $this->pages = $pages;
    }

    /**
     * @param Language $language
     * @param InputInterface $input
     * @return array|null
     */
    public function getPage(Language $language, InputInterface $input): ?array
    {
        $id = $input->get('id', null);

        if ($id) {
            return $this->transform($this->pages->find((int)$id));
        }

        $name = $input->get('name', null);

        if ($name) {
            return $this->transform($this->pages->findOneBySlug($language, $name));
        }

        return null;
    }

    /**
     * @param Language $language
     * @return iterable|array[]
     */
    public function getPages(Language $language): iterable
    {
        return $this->pages->findAllByLanguage($language)
            ->map(function(Page $page): array {
                return $this->mapPage($page);
            });
    }

    /**
     * @param Page|null $page
     * @return array|null
     */
    private function transform(?Page $page): ?array
    {
        if ($page) {
            return $this->mapPage($page);
        }
        return null;
    }

    /**
     * @param Page $page
     * @return array
     */
    private function mapPage(Page $page): array
    {
        return [
            'id'      => $page->getId(),
            'name'    => $page->getSlug(),
            'title'   => $page->getTitle(),
            'hash'    => $page->getHash(),
            'content' => $page->getContent()->getRendered(),
            'created' => $page->getCreated()->toRfc3339String(),
            'updated' => $page->getCreated()->toRfc3339String(),
        ];
    }

    /**
     * @param Language $language
     * @param InputInterface $input
     * @return array|null
     * @throws \LogicException
     */
    public function getNavigation(Language $language, InputInterface $input): ?array
    {
        return $this->pages
            ->findMenusBySlug($language, \trim($input->get('in', ''), '/ '))
            ->map(function(Page $page): array {
                return $this->mapPage($page);
            })
            ->first();
    }
}
