<?php

declare(strict_types=1);

namespace App\Domain\Documentation\Search;

use App\Domain\Documentation\Page;
use App\Domain\Documentation\PageRepositoryInterface;
use Doctrine\Persistence\ObjectManager;

final readonly class IndexGenerator
{
    public function __construct(
        private ObjectManager $em,
        private IndexRepositoryInterface $indices,
        private PageRepositoryInterface $pages,
    ) {
    }

    public function truncate(): void
    {
        foreach ($this->indices->findAll() as $index) {
            $this->em->remove($index);
        }

        $this->em->flush();
    }

    public function sync(): void
    {
        foreach ($this->pages->findAll() as $page) {
            foreach ($this->analyze($page) as $level => $title) {
                $index = new Index($title, $page, $level);
                $index->setLevel($level);

                $this->em->persist($index);
            }
        }

        $this->em->flush();
    }

    /**
     * @return iterable<string>
     */
    private function analyze(Page $page): iterable
    {
        $content = $page->getContent();

        \preg_match_all(
            pattern: '/<h(\d).+?>(.+?)<\/h\d>/isum',
            subject: $content->getRenderedContent(),
            matches: $matches,
            flags: \PREG_SET_ORDER,
        );

        foreach ($matches as [, $level, $title]) {
            yield (int)$level => \strip_tags($title);
        }
    }
}
