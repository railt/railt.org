<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\System;

/**
 * Class Struct
 */
abstract class Struct
{
    /**
     * @param string $name
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function __get(string $name)
    {
        if (\property_exists($this, $name)) {
            return $this->$name;
        }

        $error = 'Property %s does not exists or not accessible';
        throw new \InvalidArgumentException(\sprintf($error, $name));
    }
}
