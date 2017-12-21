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
     * @return array
     */
    private function getRepositories(): array
    {
        return [
            $this->getLaravel()->make(External::class),
            $this->getLaravel()->make(Internal::class),
        ];
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
        /**
         * @var External $external
         * @var Internal $internal
         */
        [$external, $internal] = $this->getRepositories();

        foreach ($docs->findAll() as $document) {
            $this->line('<info>Page:</info> ' . $document);
            $pages = [];

            // Find all new pages
            foreach ($external->findAllByDocument($document) as $page) {
                $pages[] = $page->getPath();
                $exists = $internal->findOneByPath($document, $page->getPath());

                $exists->updateBy($page);
                $em->persist($exists);

                switch ($page->compare($exists)) {
                    case Page\Status::NOT_FOUND:
                        $this->line(' ├┈ <info>✚ Create:</info> ' . $page->getTitle());
                        break;
                    case Page\Status::OBSOLETE:
                        $this->line(' ├┈ <info>⟷ Update:</info> ' . $page->getTitle());
                        break;
                    default:
                        $this->line(' ├┈ <comment>✔ Actual:</comment> ' . $page->getTitle());
                }
            }

            $deleted = $internal->query
                ->where('document', $document)
                ->whereNotIn('path', $pages)
                ->get();

            foreach ($deleted as $page) {
                $this->line(' ├┈ <error>✖ Deleted:</error> ' . $page->getTitle());
                $em->remove($page);
            }

            $em->flush();
            $this->info('----- Completed -----');
        }
    }
}
