<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\View\Composers;

use App\Services\Language;
use Illuminate\Contracts\View\View;

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
     * LanguageComposer constructor.
     * @param Language $language
     */
    public function __construct(Language $language)
    {
        $this->language = $language;
    }

    /**
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('lang', $this->language->get())
            ->with('languages', $this->language->all());
    }
}
