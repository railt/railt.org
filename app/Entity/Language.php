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
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Support\Str;

/**
 * @ORM\Entity()
 * @ORM\Table(name="languages")
 * @ORM\HasLifecycleCallbacks()
 */
class Language
{
    use Identifiable;

    /**
     * @var string
     * @ORM\Column(name="code", type="string")
     */
    private $code;

    /**
     * @var string
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    /**
     * @var bool
     * @ORM\Column(name="is_default", type="boolean")
     */
    private $default = false;

    /**
     * Language constructor.
     * @param string $code
     * @param string|null $title
     */
    public function __construct(string $code, string $title = null)
    {
        $this->code = $code;
        $this->title = $title ?? Str::title($code);
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /***
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->title;
    }
}
