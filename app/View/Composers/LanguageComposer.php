<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\View\Composers;

use App\Entity\Language;
use App\Repository\LanguagesRepository;
use Illuminate\Contracts\View\View;
use Serafim\Hydrogen\Collection;

/**
 * Class LanguageComposer
 */
class LanguageComposer
{
    /**
     * @var Language
     */
    private $language;

    /**
     * @var Language[]|Collection
     */
    private $languages;

    /**
     * LanguageComposer constructor.
     * @param Language $language
     * @param LanguagesRepository $languages
     */
    public function __construct(Language $language, LanguagesRepository $languages)
    {
        $this->language  = $language;
        $this->languages = $languages->findAll();
    }

    /**
     * @param View $view
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('lang', $this->language->getCode());
        $view->with('languages', $this->languages);
    }
}
