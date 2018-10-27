<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Renderer\Hook;

use Highlight\Highlighter;

/**
 * Class CodeHighlight
 */
class CodeHighlight extends BaseHook
{
    /**
     * @var Highlighter
     */
    private $hl;

    /**
     * CodeHighlight constructor.
     * @param Highlighter $hl
     */
    public function __construct(Highlighter $hl)
    {
        $this->hl = $hl;
    }

    /**
     * @param string $rendered
     * @return string
     */
    public function after(string $rendered): string
    {
        $pattern = '/<pre><code\h+class="language\-(?<lang>\w+)">(?<code>.+?)<\/code><\/pre>/isu';

        return \preg_replace_callback($pattern, function (array $matches) {
            ['lang' => $lang, 'code' => $code] = $matches;

            try {
                $code = \html_entity_decode($code);
                $code = $this->hl->highlight($lang, $code)->value;

                return $this->code($lang, $code);
            } catch (\Throwable $e) {
                return $this->code($lang, $code);
            }
        }, $rendered);
    }

    /**
     * @param string $lang
     * @param string $code
     * @return string
     */
    private function code(string $lang, string $code): string
    {
        return \sprintf('<pre><code data-language="%s">%s</code></pre>', $lang, $code);
    }
}
