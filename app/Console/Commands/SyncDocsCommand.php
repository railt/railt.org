<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\Page;
use Illuminate\Console\Command;
use App\Repository\DocsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\GitHub\Pages as External;
use App\Repository\Database\Pages as Internal;
use Symfony\Component\Console\Helper\ProgressBar;

/**
 * Class DocsSyncCommand
 */
class SyncDocsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:docs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync documentation';

    /**
     * @var External
     */
    private $external;

    /**
     * @var Internal
     */
    private $internal;

    /**
     * ComponentsSyncCommand constructor.
     * @param External $external
     * @param Internal $internal
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    public function __construct(External $external, Internal $internal)
    {
        [$this->external, $this->internal] = [$external, $internal];
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param DocsRepository $docs
     * @param EntityManagerInterface $em
     * @return void
     * @throws \Exception
     */
    public function handle(DocsRepository $docs, EntityManagerInterface $em): void
    {
        foreach ($docs->findAll() as $document) {
            $this->getOutput()->write('<info>Page:</info> ' . $document);

            // Find all new pages
            foreach ($this->external->findAllByDocument($document) as $page) {
                $exists = $this->internal->findOneByPath($document, $page->getPath());

                if ($page->compare($exists) === Page\Status::OBSOLETE) {
                    $em->persist($page);
                }
            }

            $em->flush();
            $this->info(' OK');
        }
    }
}
