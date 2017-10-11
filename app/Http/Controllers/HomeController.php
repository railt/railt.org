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

/**
 * Class HomeController
 */
class HomeController
{
    /**
     * @param Language $language
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Language $language)
    {
        return \view('pages.home');
    }
}
