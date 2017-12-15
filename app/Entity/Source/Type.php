<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Source;

use CommerceGuys\Enum\AbstractEnum;

/**
 * Class Type
 */
class Type extends AbstractEnum
{
    /**
     *
     */
    public const PACKAGE = 'Package';

    /**
     *
     */
    public const COMPONENT = 'Component';

    /**
     *
     */
    public const DOCUMENTATION = 'Documentation';

    /**
     *
     */
    public const COMMON = 'Common';
}
