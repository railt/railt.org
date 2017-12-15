<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Mapping;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @Annotation
 * @Target({"CLASS"})
 */
class Repository extends BaseAnnotation
{
    protected const DEFAULT_VALUE = 'entity';

    /**
     * @var string
     */
    public $entity;

    /**
     * @var array
     */
    private $classes = [];


    /**
     * @param array|string[] $classes
     * @return Repository
     */
    public function setClasses($classes): Repository
    {
        $this->classes = (array)$classes;

        return $this;
    }

    /**
     * @return array|string[]
     */
    public function getClasses(): array
    {
        return $this->classes;
    }

    /**
     * @return null|string
     */
    public function getDefaultClass(): ?string
    {
        return \array_first($this->classes);
    }
}
