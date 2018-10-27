<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Search;

use App\Entity\Document;
use App\Entity\Document\Content;
use App\Entity\Document\Navigation;

/**
 * Class DocumentResult
 */
class DocumentResult extends Result
{
    /**
     * DocumentResult constructor.
     * @param string $query
     * @param Document $doc
     * @throws \InvalidArgumentException
     */
    public function __construct(string $query, Document $doc)
    {
        $content = $this->extractContent($query, $doc->getNavigation(), $doc->getContent());
        $uri     = \route('docs.page', ['page' => $doc->getUrn()]);

        parent::__construct($doc->getTitle(), $content, $uri);
    }

    /**
     * @param string $query
     * @param Navigation $navigation
     * @param Content $content
     * @return string
     */
    private function extractContent(string $query, Navigation $navigation, Content $content): string
    {
        $query = \mb_strtolower($query);

        foreach ($navigation as $nav) {
            $inTitle = \mb_strpos($nav[Navigation::INDEX_TITLE], $query) >= 0;

            if ($inTitle) {
                return $nav[Navigation::INDEX_TITLE];
            }
        }

        return '';
    }
}
