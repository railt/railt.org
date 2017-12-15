<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\Database;

use App\Entity\Language;
use App\Entity\Page;
use App\Entity\Document;
use Illuminate\Support\Str;
use Serafim\Hydrogen\Collection;
use Serafim\Hydrogen\Query\Proxy;
use Serafim\Hydrogen\Query\Builder;
use Serafim\Hydrogen\Repository\DatabaseRepository;
use App\Repository\PagesRepository as PagesRepositoryInterface;

/**
 * @method Builder|Proxy|$this menus()
 * @method Builder|Proxy|$this pages()
 * @method Builder|Proxy|$this whereLanguage(Language $lang)
 */
class Pages extends DatabaseRepository implements PagesRepositoryInterface
{
    /**
     * @param Document $document
     * @param string $path
     * @return Page
     * @throws \Exception
     */
    public function findOneByPath(Document $document, string $path): Page
    {
        $filter = function (Page $page) use ($path): bool {
            return $page->getPath() === $path;
        };

        return Collection::make($document->getPages())
            ->first($filter, new Page($document, $path));
    }

    /**
     * @param Language $language
     * @param string $slug
     * @return Collection
     * @throws \LogicException
     */
    public function findPagesBySlug(Language $language, string $slug): Collection
    {
        $sort = function(Page $page): int { return Str::length($page->getSlug()); };

        return $this->query->whereLanguage($language)
            ->pages()->where('slug', \iterator_to_array(Page::slugDepth($slug)))
            ->get()->sortBy($sort);
    }

    /**
     * @param Language $language
     * @param string $slug
     * @return Collection
     * @throws \LogicException
     */
    public function findMenusBySlug(Language $language, string $slug): Collection
    {
        $sort = function(Page $page): int { return Str::length($page->getSlug()); };

        return $this->query->whereLanguage($language)
            ->menus()->where('slug', \iterator_to_array(Page::slugDepth($slug)))
            ->get()->sortBy($sort);
    }

    /**
     * @param Builder $query
     * @return Builder
     * @throws \LogicException
     */
    public function scopeMenus(Builder $query): Builder
    {
        return $query->where('type', Page\Type::MENU);
    }

    /**
     * @param Builder $query
     * @return Builder
     * @throws \LogicException
     */
    public function scopePages(Builder $query): Builder
    {
        return $query->where('type', Page\Type::CONTENT);
    }

    /**
     * @param Builder $query
     * @param Language $language
     * @return Builder
     * @throws \LogicException
     */
    public function scopeWhereLanguage(Builder $query, Language $language): Builder
    {
        $relation = function (Builder $query) use ($language): Builder {
            return $query->where('lang', $language);
        };

        return $query->with('document', $relation);
    }

    /**
     * @param Language $language
     * @param string $slug
     * @return Page|object|null
     * @throws \LogicException
     */
    public function findOneBySlug(Language $language, string $slug): ?Page
    {
        return $this->query->whereLanguage($language)
            ->where('slug', $slug)
            ->first();
    }

    /**
     * @param Document $document
     * @return Collection|Pages[]
     * @throws \LogicException
     */
    public function findAllByDocument(Document $document): Collection
    {
        return $this->query->where('document', $document)->get();
    }
}
