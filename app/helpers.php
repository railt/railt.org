<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

if (! function_exists('asset_ts')) {
    /**
     * Asset path with timestamp.
     *
     * @param  string $path
     * @param  string $directory
     * @return string
     */
    function asset_ts(string $path = '', string $directory = 'dist/'): string
    {
        $link = '/' . $directory . $path;

        $hash = \is_file(\public_path($link)) ? \filemtime(\public_path($link)) : \random_int(0, 9999);

        return $link . '?' . $hash;
    }
}

if (! function_exists('one_of')) {
    /**
     * @param string|int|mixed $needle
     * @param array $values
     * @return bool
     */
    function one_of($needle, array $values): bool
    {
        return \in_array($needle, $values, true);
    }
}


if (! function_exists('enum')) {
    /**
     * @param string|\CommerceGuys\Enum\AbstractEnum $enum
     * @param mixed|string|int $value
     * @return bool
     */
    function enum(string $enum, $value): bool
    {
        return $enum::exists($value);
    }
}
