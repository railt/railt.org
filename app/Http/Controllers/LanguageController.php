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
use App\Entity\Repositories\LanguageRepository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\RedirectResponse;

/**
 * Class LanguageController
 */
class LanguageController extends Controller
{
    /**
     * @var Container
     */
    private $app;

    /**
     * @var LanguageRepository
     */
    private $languages;

    /**
     * LanguageController constructor.
     * @param Container $app
     * @param LanguageRepository $languages
     */
    public function __construct(Container $app, LanguageRepository $languages)
    {
        $this->app       = $app;
        $this->languages = $languages;
    }

    /**
     * @param string $lang
     * @return RedirectResponse
     * @throws \InvalidArgumentException
     */
    public function select(string $lang): RedirectResponse
    {
        $language = $this->languages->findByCode($lang);

        if ($language) {
            $this->app->instance(Language::class, $language);
        }

        return \redirect()->back();
    }
}
