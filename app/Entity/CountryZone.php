<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Common\Identifiable;
use App\Entity\Common\Identifier;

/**
 * Class CountryZone
 */
class CountryZone implements Identifiable
{
    use Identifier;

    /**
     * @var Country|null
     */
    protected $country;

    /**
     * @var int
     */
    protected $ipFrom;

    /**
     * @var int
     */
    protected $ipTo;

    /**
     * @return Country|null
     */
    public function getCountry(): ?Country
    {
        return $this->country;
    }
}
