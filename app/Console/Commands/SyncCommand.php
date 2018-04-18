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

/**
 * Class SyncCommand
 */
class SyncCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync all';

    /**
     * Execute the console command.
     *
     * @return void
     * @throws \Symfony\Component\Console\Exception\CommandNotFoundException
     */
    public function handle(): void
    {
        // $this->call('documentation:download');
        $this->call('documentation:sync');
    }
}
