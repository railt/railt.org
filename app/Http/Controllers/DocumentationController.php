<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Language;
use App\Services\Renderer\ContentRenderer;

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
    private const DEFAULT_EXTENSION = '.md';

    /**
     *
     */
    private const DEFAULT_NAV_PAGE = '_sidebar';

    /**
     * @param Language $language
     * @return string
     */
    public function getPath(Language $language): string
    {
        return \resource_path('docs/' . $language->get());
    }

    /**
     * @param ContentRenderer $renderer
     * @param null|string $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(ContentRenderer $renderer, ?string $page = self::DEFAULT_PAGE)
    {
        return \view('pages.docs', [
            'content' => $this->render($renderer, $page),
            'nav'     => $this->render($renderer, self::DEFAULT_NAV_PAGE),
        ]);
    }


    /**
     * @param ContentRenderer $renderer
     * @param string $page
     * @return string
     * @throws \Throwable
     */
    private function render(ContentRenderer $renderer, string $page): string
    {
        $result = $this->read($page, function(): string {
            return \view('pages.404')->render();
        });

        \Log::info('Read ' . $page . "\n" . $result);

        // Add cache
        $result = $renderer->render($result);

        \Log::info('Render ' . $page . "\n" . $result);

        return $result;
    }

    /**
     * @param string $page
     * @param \Closure $default
     * @return string
     */
    private function read(string $page, \Closure $default): string
    {
        $path = $this->getPath(app(Language::class));

        $file = $path . '/' . $page . self::DEFAULT_EXTENSION;

        \Log::info('Search ' . $file);

        return \is_readable($file) ? \file_get_contents($file) : $default();
    }
}
