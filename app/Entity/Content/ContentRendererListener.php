<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Content;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

/**
 * Class ContentRendererListener
 */
class ContentRendererListener
{
    /**
     * @var Markdown
     */
    private $renderer;

    /**
     * ContentRendererListener constructor.
     * @param Markdown $renderer
     */
    public function __construct(Markdown $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param HasContent $document
     * @param LifecycleEventArgs $event
     */
    public function prePersist(HasContent $document, LifecycleEventArgs $event): void
    {
        $document->getContent()->render($this->renderer);
    }

    /**
     * @param HasContent $document
     * @param PreUpdateEventArgs $event
     */
    public function preUpdate(HasContent $document, PreUpdateEventArgs $event): void
    {
        $document->getContent()->render($this->renderer);
    }
}
