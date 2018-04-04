<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\GraphQL\Extensions\Carbon;

use Carbon\Carbon;

/**
 * Class Presenter
 */
class Presenter
{
    /**
     * @param Carbon $carbon
     * @return array
     */
    public function toArray(Carbon $carbon): array
    {
        return [
            'format'        => $carbon->toRfc3339String(),
            'diffForHumans' => $carbon->diffForHumans(),
        ];
    }
}
