<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Subscriber;

use Local\ContentRenderer\ContentRendererInterface;
use App\Domain\Documentation\Page;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\PrePersistEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;

final readonly class RenderPageSubscriber implements EventSubscriber
{
    public function __construct(
        private ContentRendererInterface $renderer,
    ) {}

    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist => 'prePersist',
            Events::preUpdate  => 'preUpdate',
        ];
    }

    public function prePersist(PrePersistEventArgs $events): void
    {
        $this->render($events->getObject());
    }

    public function preUpdate(PreUpdateEventArgs $events): void
    {
        $this->render($events->getObject());
    }

    private function render(object $entity): void
    {
        if ($entity instanceof Page) {
            $content = $entity->getContent();

            if (!$content->isRendered()) {
                $html = $this->renderer->render($content->getRawContent());

                $content->render($html);
            }
        }
    }
}
