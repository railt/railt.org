<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Content\Rule\CodeHighlight;

/**
 * Class PhpLanguage
 */
class PhpLanguage extends Language
{
    /**
     * @param string $code
     * @return string
     */
    public function parse(string $code): string
    {
        return $this->hl->highlight('php', $code)->value;
    }
}
