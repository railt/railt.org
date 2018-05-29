<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Documentation;

use App\Entity\Content\HasContent;
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
     * @param ContainsNavigation|HasContent $document
     */
    private function extract(ContainsNavigation $document): void
    {
        $links = \iterator_to_array($this->read($document));

        $document->getNavigation()->setLinks($links);
    }

    /**
     * @param HasContent $document
     * @return \Traversable|Link[]
     */
    private function read(HasContent $document): \Traversable
    {
        $content = $document->getContent()->toHtml();

        \preg_match_all('/<h(\d)\h+id="(.*?)">(.*?)<\/h\d>/isum', $content, $matches);


        for ($i = 0, $len = \count($matches[1]); $i < $len; ++$i) {
            [$level, $anchor, $content] = [$matches[1][$i], $matches[2][$i], $matches[3][$i]];

            yield new Link(\strip_tags($content), (int)$level, $anchor);
        }
    }

    /**
     * @param ContainsNavigation $document
     * @param PreUpdateEventArgs $event
     */
    public function preUpdate(ContainsNavigation $document, PreUpdateEventArgs $event): void
    {
        $this->extract($document);
    }
}
