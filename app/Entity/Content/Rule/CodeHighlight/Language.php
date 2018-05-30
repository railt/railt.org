<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Content\Rule\CodeHighlight;

use Highlight\Highlighter;

/**
 * Class Language
 */
abstract class Language
{
    /**
     * @var Highlighter
     */
    protected $hl;

    /**
     * Language constructor.
     * @param Highlighter $hl
     */
    public function __construct(Highlighter $hl)
    {
        $this->hl = $hl;
    }

    /**
     * @param string $code
     * @return string
     */
    public function parse(string $code): string
    {
        return $code;
    }
}
