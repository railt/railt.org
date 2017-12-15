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
use Symfony\Component\Console\Helper\ProgressBar;

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
     * @param EntityManagerInterface $em
     * @return void
     * @throws \Exception
     */
    public function handle(EntityManagerInterface $em): void
    {
        $this->getOutput()->write('<info>Contributors:</info>');

        /** @var Contributor $new */
        foreach ($this->external->findAll() as $new) {
            $found = $this->internal->findOneByGitHubId($new->getGitHubId());

            if ($found !== null) {
                $found->update($new);
            }

            $em->persist($found ?? $new);
        }

        $em->flush();
        $this->info(' OK');
    }
}
