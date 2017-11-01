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
 * Class ChatController
 */
class ChatController
{
    /**
     * @return View
     */
    public function show(): View
    {
        return \view('pages.chat', [
            'join' => 'https://discord.gg/ND7SpD4'
        ]);
    }
}
