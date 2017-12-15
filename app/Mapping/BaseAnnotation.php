<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Mapping;

use Illuminate\Support\Str;

/**
 * Class BaseAnnotation
 */
abstract class BaseAnnotation
{
    /**
     * Default value can be overwritten
     */
    protected const DEFAULT_VALUE = 'value';

    /**
     * Default doctrine annotation value name
     */
    private const DOCTRINE_VALUE = 'value';

    /**
     * BaseAnnotation constructor.
     * @param array $values
     */
    public function __construct(array $values = [])
    {
        foreach ($values as $key => $value) {
            $key    = $this->key($key);
            $setter = $this->setter($key);

            if (\method_exists($this, $setter)) {
                $this->$setter($value);
            } elseif (\property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @param string $key
     * @return string
     */
    private function key(string $key): string
    {
        return $key === self::DOCTRINE_VALUE ? static::DEFAULT_VALUE : $key;
    }

    /**
     * @param string $key
     * @return string
     */
    private function setter(string $key): string
    {
        return 'set' . Str::studly($key);
    }
}
