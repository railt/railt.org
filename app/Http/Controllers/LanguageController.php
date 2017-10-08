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

/**
 * Class LanguageController
 */
class LanguageController
{
    /**
     * @param Language $language
     * @param string $lang
     * @return \Illuminate\Http\RedirectResponse
     * @throws \InvalidArgumentException
     */
    public function select(Language $language, string $lang)
    {
        $language->set($lang);

        return \redirect()->route('home');
    }
}
