<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory as Views;
use Illuminate\Contracts\View\View as ViewInterface;

/**
 * Class HomeController
 */
class HomeController extends Controller
{
    /**
     * @param Views $views
     * @return ViewInterface
     */
    public function index(Views $views): ViewInterface
    {
        return $views->make('page.home', [

        ]);
    }
}
