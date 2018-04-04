<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\GraphQL\Extensions\Carbon;

use App\Entity\Common\Creatable;
use App\Entity\Common\Timestampable;
use App\Entity\Common\Updatable;
use Carbon\Carbon;
use Illuminate\Support\Optional;
use Railt\Http\InputInterface;

/**
 * Class DateTimeController
 */
class Controller
{
    /**
     * @param InputInterface $input
     * @return null|string
     * @throws \InvalidArgumentException
     */
    public function format(InputInterface $input): ?string
    {
        return $this->getCarbon($input)->format(
            \constant(Carbon::class . '::' . $input->get('type'))
        );
    }

    /**
     * @param InputInterface $input
     * @return Carbon|Optional
     * @throws \InvalidArgumentException
     */
    private function getCarbon(InputInterface $input)
    {
        return \optional($input->getParent());
    }

    /**
     * @param InputInterface $input
     * @return null|string
     * @throws \InvalidArgumentException
     */
    public function diffForHumans(InputInterface $input): ?string
    {
        return $this->getCarbon($input)->diffForHumans();
    }
}
