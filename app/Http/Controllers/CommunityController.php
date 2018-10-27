<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

/**
 * Class CommunityController
 */
class CommunityController extends Controller
{
    /**
     * @return View
     * @throws \LogicException
     */
    public function index(): View
    {
        return \view('page.community');
    }
}
