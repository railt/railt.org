<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Content\Rule;

use App\Entity\Content\Rule\CodeHighlight\AccordLanguage;
use App\Entity\Content\Rule\CodeHighlight\GraphQLLanguage;
use App\Entity\Content\Rule\CodeHighlight\JsonLanguage;
use App\Entity\Content\Rule\CodeHighlight\Language;
use App\Entity\Content\Rule\CodeHighlight\PhpLanguage;
use Highlight\Highlighter;

/**
 * Class CodeHighlight
 */
class CodeHighlight implements Before
{
    /**
     * @var array|Language[]
     */
    private $languages = [];

    /**
     * CodeHighlight constructor.
     * @param Highlighter $hl
     */
    public function __construct(Highlighter $hl)
    {
        $this->languages['php'] = new PhpLanguage($hl);
        $this->languages['graphql'] = new GraphQLLanguage($hl);
        $this->languages['gql'] = new GraphQLLanguage($hl);
        $this->languages['json'] = new JsonLanguage($hl);
        $this->languages['accord'] = new AccordLanguage($hl);
    }

    /**
     * @param string $content
     * @return string
     */
    public function before(string $content): string
    {
        $applicant = function (array $matches): string {
            [$body, $lang, $code] = $matches;

            $parsed = false;
            foreach ($this->languages as $name => $formatter) {
                if ($name === $lang) {
                    $parsed = true;
                    $code = $formatter->parse($code);
                }
            }

            if (! $parsed) {
                $code = \htmlspecialchars($code);
            }

            return \sprintf('<pre><code data-language="%s">%s</code></pre>', $lang, $code);
        };

        return (string)\preg_replace_callback('/^```(\w+)\n(.*?)\n```/misu', $applicant, $content);
    }
}
