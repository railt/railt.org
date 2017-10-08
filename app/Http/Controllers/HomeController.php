<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

/**
 * Class HomeController
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return \view('pages.home');
    }
}
