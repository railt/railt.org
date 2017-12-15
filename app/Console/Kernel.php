<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console;

use App\Console\Commands;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/**
 * Class Kernel
 */
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\BootCommand::class,
        Commands\SyncDocsCommand::class,
        Commands\SyncComponentsCommand::class,
        Commands\SyncIssuesCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('sync:components')
                 ->hourly();
        //$schedule->command('')
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require \base_path('routes/console.php');
    }
}
