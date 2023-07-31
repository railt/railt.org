<?php

declare(strict_types=1);

namespace App\Domain\Sync;

use App\Domain\Documentation\Page;
use App\Domain\Documentation\PageRepositoryInterface;
use App\Domain\Search\Index;
use App\Domain\Search\IndexRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Console\Output\OutputInterface;

class SearchIndexUpdater extends Updater
{
    public function __construct(
        EntityManager $em,
        IndexRepositoryInterface $search,
        private readonly PageRepositoryInterface $docs,
    ) {
        parent::__construct($em, $search);
    }

    /**
     * @param OutputInterface $out
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function update(OutputInterface $out): void
    {
        foreach ($this->docs->findAll() as $page) {
            foreach ($this->analyze($page) as $level => $title) {
                $index = new Index($title, $page);
                $index->setLevel($level);

                $this->em->persist($index);
            }
        }

        $this->em->flush();
    }

    /**
     * @param Page $page
     * @return iterable<string>
     */
    private function analyze(Page $page): iterable
    {
        \preg_match_all('/<h(\d)>(.+?)<\/h\d>/isum', $page->getContent(),
            $matches, \PREG_SET_ORDER);

        foreach ($matches as [, $level, $title]) {
            yield (int)$level => \strip_tags($title);
        }
    }
}
