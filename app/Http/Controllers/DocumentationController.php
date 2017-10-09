<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Document;
use App\Services\Language;
use App\Services\Renderer\ContentRenderer;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DocumentationController
 */
class DocumentationController
{
    /**
     * Page name
     */
    private const DEFAULT_PAGE = 'README';

    /**
     *
     */
    private const DEFAULT_NAV_PAGE = '_sidebar';

    /**
     * @param Language $language
     * @param ContentRenderer $renderer
     * @param null|string $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function show(Language $language, ContentRenderer $renderer, ?string $page = self::DEFAULT_PAGE)
    {
        /** @var Document $document */
        $document = Document::query()
            ->where('lang', $language->get())
            ->where('uri', $page)
            ->first();

        return \view('pages.docs', [
            'content' => $document,
            'nav'     => $this->getNavigation($language),
        ]);
    }

    /**
     * @param Language $language
     * @return string
     */
    private function getNavigation(Language $language): string
    {
        /** @var Document $result */
        $result = Document::query()
            ->where('lang', $language->get())
            ->where('uri', self::DEFAULT_NAV_PAGE)
            ->first();

        if ($result === null) {
            return '';
        }

        return $result->content_rendered;
    }
}
