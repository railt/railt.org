<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\GitHub\Issues as External;
use App\Repository\Database\Issues as Internal;
use Symfony\Component\Console\Helper\ProgressBar;

/**
 * Class SyncIssuesCommand
 */
class SyncIssuesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:issues';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync an issues';

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
     * @throws \LogicException
     */
    public function handle(EntityManagerInterface $em): void
    {
        $this->getOutput()->write('<info>Issues:</info>');

        foreach ($this->external->findAll() as $issue) {
            $found = $this->internal->findOneByUrl($issue->getUrl());

            if ($found !== null) {
                $found->update($issue);
            }

            $em->persist($found ?? $issue);
        }

        $em->flush();
        $this->info(' OK');
    }
}
