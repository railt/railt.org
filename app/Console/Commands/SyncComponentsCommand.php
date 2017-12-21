<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\Component;
use Illuminate\Console\Command;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ComponentsRepository;
use App\Repository\GitHub\Releases as External;
use App\Repository\Database\Releases as Internal;

/**
 * Class ComponentsSyncCommand
 */
class SyncComponentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:components';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync components list, releases and commits';

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
     * @param ComponentsRepository $components
     * @param EntityManagerInterface $em
     * @return void
     * @throws \LogicException
     */
    public function handle(ComponentsRepository $components, EntityManagerInterface $em): void
    {
        /**
         * @var External $external
         * @var Internal $internal
         */
        [$external, $internal] = $this->getRepositories();

        /** @var Component $component */
        foreach ($components->findAll() as $component) {
            $this->getOutput()->write('<info>Component:</info> ' . $component);

            foreach ($external->findByComponent($component) as $release) {
                $saved = $internal->findOneByVersion($component, $release->getVersion());

                if ($saved === null) {
                    $em->persist($release);
                }
            }

            $em->flush();
            $this->info(' OK');
        }
    }
}
