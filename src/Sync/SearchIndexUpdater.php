<?php

declare(strict_types=1);

namespace App\Sync;

use App\Entity\Documentation;
use App\Entity\SearchIndex;
use App\Repository\DocumentationRepository;
use App\Repository\SearchIndexRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Console\Output\OutputInterface;

class SearchIndexUpdater extends Updater
{
    /**
     * @var DocumentationRepository
     */
    private DocumentationRepository $docs;

    /**
     * @param EntityManager $em
     * @param SearchIndexRepository $search
     * @param DocumentationRepository $docs
     */
    public function __construct(EntityManager $em, SearchIndexRepository $search, DocumentationRepository $docs)
    {
        parent::__construct($em, $search);
        $this->docs = $docs;
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
