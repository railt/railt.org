<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\View\Directives;

/**
 * Interface Directive
 */
interface Directive
{
    /**
     * @param string $expression
     * @return string
     */
    public function __invoke(string $expression): string;
}
