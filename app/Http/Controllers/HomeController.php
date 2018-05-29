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
use App\Entity\Language\ContainsLanguages;
use Illuminate\Contracts\View\Factory as Views;
use Illuminate\Contracts\View\View as ViewInterface;

/**
 * Class HomeController
 */
class HomeController extends Controller
{
    /**
     * @param Views $views
     * @param ContainsLanguages $languages
     * @param Language $current
     * @return ViewInterface
     */
    public function index(Views $views, ContainsLanguages $languages, Language $current): ViewInterface
    {
        return $views->make('home', [
            'languages' => $languages->getLanguages(),
            'current'   => $current,
        ]);
    }
}
