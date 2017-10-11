<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Str;

/**
 * Class DonateController
 */
class DonateController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return \view('pages.donate', [
            'label'    => Str::random(),
            'receiver' => \env('YANDEX_RECEIVER'),
        ]);
    }
}
