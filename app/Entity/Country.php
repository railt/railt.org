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
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Country
 */
class Country implements Identifiable
{
    use Identifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var CountryZone[]|ArrayCollection
     */
    protected $zones;

    /**
     * @var Language|null
     */
    protected $language;

    /**
     * Country constructor.
     */
    public function __construct()
    {
        $this->zones = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return CountryZone[]|ArrayCollection
     */
    public function getZones(): iterable
    {
        return $this->zones;
    }

    /**
     * @return Language|null
     */
    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function hasLanguage(): bool
    {
        return $this->language !== null;
    }
}
