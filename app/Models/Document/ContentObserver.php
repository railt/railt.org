<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Models\Document;

use App\Models\Document;
use App\Services\Renderer\ContentRenderer;

/**
 * Class ContentObserver
 */
class ContentObserver
{
    /**
     * @var ContentRenderer
     */
    private $renderer;

    /**
     * ContentObserver constructor.
     * @param ContentRenderer $renderer
     */
    public function __construct(ContentRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param Document $document
     * @return void
     */
    public function saving(Document $document): void
    {
        $document->title = $this->getTitle($document->content_original);
        $document->content_rendered = $this->renderer->render($document->content_original);
    }

    /**
     * @param string $body
     * @return string
     */
    private function getTitle(string $body): string
    {
        $result = (bool)\preg_match('/#\h*(.*?)\n/isu', $body, $matches);

        if ($result && $matches[1] ?? false) {
            return \trim($matches[1]);
        }

        return '';
    }
}
