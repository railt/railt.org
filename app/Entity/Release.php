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
use App\Entity\Common\Timestampable;
use App\Entity\Content\HasContent;
use App\Entity\Content\Renderable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="releases")
 * @ORM\HasLifecycleCallbacks()
 */
class Release implements Renderable
{
    use HasContent;
    use Identifiable;
    use Timestampable;

    /**
     * @var string
     * @ORM\Column(name="version", type="string")
     */
    private $version;

    /**
     * @var Component
     * @ORM\ManyToOne(targetEntity=Component::class, inversedBy="releases")
     * @ORM\JoinColumn(name="component_id", referencedColumnName="id")
     */
    private $component;

    /**
     * Release constructor.
     * @param Component $component
     * @param string $version
     * @param string $body
     */
    public function __construct(Component $component, string $version, string $body = '')
    {
        $this->version = $version;
        $this->component = $component;
        $this->content = new Content($body);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return \vsprintf('https://github.com/railt/%s/releases/tag/%s', [
            $this->getComponent()->getSource()->getName(),
            $this->getVersion()
        ]);
    }

    /**
     * @return Component
     */
    public function getComponent(): Component
    {
        return $this->component;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }
}
