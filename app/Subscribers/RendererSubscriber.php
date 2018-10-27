<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Subscribers;

use App\Entity\Common\ProvidesContent;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Renderer\RendererInterface;

/**
 * Class RendererSubscriber
 */
class RendererSubscriber extends Subscriber
{
    /**
     * @var RendererInterface
     */
    private $renderer;

    /**
     * DocumentRendererSubscriber constructor.
     * @param RendererInterface $renderer
     */
    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @return array
     */
    public function getSubscribedEvents(): array
    {
        return [
            'prePersist',
            'preUpdate',
        ];
    }

    /**
     * @param LifecycleEventArgs $args
     * @throws \Exception
     */
    public function preUpdate(LifecycleEventArgs $args): void
    {
        $this->render($args);
    }

    /**
     * @param LifecycleEventArgs $args
     * @throws \Exception
     */
    protected function render(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof ProvidesContent) {
            $entity->render($this->renderer);
        }
    }

    /**
     * @param LifecycleEventArgs $args
     * @throws \Exception
     */
    public function prePersist(LifecycleEventArgs $args): void
    {
        $this->render($args);
    }
}
