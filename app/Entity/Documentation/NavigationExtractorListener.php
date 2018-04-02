<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Documentation;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

/**
 * Class NavigationExtractorListener
 */
class NavigationExtractorListener
{
    /**
     * @param ContainsNavigation $document
     * @param LifecycleEventArgs $event
     */
    public function prePersist(ContainsNavigation $document, LifecycleEventArgs $event): void
    {
        $this->extract($document);
    }

    /**
     * @param ContainsNavigation $document
     * @param PreUpdateEventArgs $event
     */
    public function preUpdate(ContainsNavigation $document, PreUpdateEventArgs $event): void
    {
        $this->extract($document);
    }

    /**
     * @param ContainsNavigation $document
     * @return \Traversable|Link[]
     */
    private function read(ContainsNavigation $document): \Traversable
    {
        $content = $document->getContent()->toHtml();

        \preg_match_all('/<h(\d)>(.*?)<\/h\d>/isum', $content, $matches);

        for ($i = 0, $len = \count($matches[1]); $i < $len; ++$i) {
            [$level, $content] = [$matches[1][$i], $matches[2][$i]];
            $content = \trim(\ltrim(\strip_tags($content), '#'));

            yield new Link($content, (int)$level);
        }
    }

    /**
     * @param ContainsNavigation $document
     */
    private function extract(ContainsNavigation $document): void
    {
        $links = \iterator_to_array($this->read($document));

        $document->getNavigation()->setLinks($links);
    }
}
