<?php

declare(strict_types=1);

namespace App\Domain\Sync;

use App\Domain\Documentation;
use App\Domain\DocumentationRepositoryInterface;
use App\Domain\SearchIndex;
use App\Domain\SearchIndexRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Console\Output\OutputInterface;

class SearchIndexUpdater extends Updater
{
    public function __construct(
        EntityManager $em,
        SearchIndexRepositoryInterface $search,
        private readonly DocumentationRepositoryInterface $docs,
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
                $index = new SearchIndex($title, $page);
                $index->setLevel($level);

                $this->em->persist($index);
            }
        }

        $this->em->flush();
    }

    /**
     * @param Documentation $page
     * @return iterable<string>
     */
    private function analyze(Documentation $page): iterable
    {
        \preg_match_all('/<h(\d)>(.+?)<\/h\d>/isum', $page->getContent(),
            $matches, \PREG_SET_ORDER);

        foreach ($matches as [, $level, $title]) {
            yield (int)$level => \strip_tags($title);
        }
    }
}
