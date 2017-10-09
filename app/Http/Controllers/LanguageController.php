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
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;

/**
 * Class LanguageController
 */
class LanguageController
{
    /**
     * @param Redirector $redirector
     * @param Language $language
     * @param string $lang
     * @return \Illuminate\Http\RedirectResponse
     * @throws \InvalidArgumentException
     */
    public function select(Redirector $redirector, Language $language, string $lang)
    {
        $fallback = \route('home');

        $language->set($lang);

        if (Str::contains($redirector->back($fallback), $fallback)) {
            return \redirect()->back(302, [], $fallback);
        }

        return \redirect()->to($fallback);
    }
}
