<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\Contributor;
use App\Repository\Database\Contributors as Internal;
use App\Repository\GitHub\Contributors as External;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;

/**
 * Class SyncContributorsCommand
 */
class SyncContributorsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:contributors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync contributors';

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
     * @param EntityManagerInterface $em
     * @return void
     * @throws \Exception
     */
    public function handle(EntityManagerInterface $em): void
    {
        /**
         * @var External $external
         * @var Internal $internal
         */
        [$external, $internal] = $this->getRepositories();

        $this->getOutput()->write('<info>Contributors:</info>');

        /** @var Contributor $new */
        foreach ($external->findAll() as $new) {
            $found = $internal->findOneByGitHubId($new->getGitHubId());

            if ($found !== null) {
                $found->update($new);
            }

            $em->persist($found ?? $new);
        }

        $em->flush();
        $this->info(' OK');
    }
}
