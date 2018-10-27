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
 * Class Language
 */
class Language implements Identifiable
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
     * @var Country[]|ArrayCollection
     */
    protected $countries;

    /**
     * @var Document[]|ArrayCollection
     */
    protected $documentations;

    /**
     * @var Menu[]|ArrayCollection
     */
    protected $menus;

    /**
     * @var bool
     */
    private $auto = false;

    /**
     * Language constructor.
     */
    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->countries = new ArrayCollection();
        $this->documentations = new ArrayCollection();
    }

    /**
     * @return Language
     */
    public function autodetect(): Language
    {
        $this->auto = true;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAutoDetectable(): bool
    {
        return $this->auto;
    }

    /**
     * @return Country[]|ArrayCollection
     */
    public function getCountries(): iterable
    {
        return $this->countries;
    }

    /**
     * @return Document[]|ArrayCollection
     */
    public function getDocuments(): iterable
    {
        return $this->documentations;
    }

    /**
     * @return Menu[]|ArrayCollection
     */
    public function getMenus(): iterable
    {
        return $this->menus;
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
}
