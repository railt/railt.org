<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class BootCommand
 */
class BootCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize an application';

    /**
     * @return void
     * @throws \Exception
     * @throws \Symfony\Component\Console\Exception\CommandNotFoundException
     */
    public function handle(): void
    {
        $this->call('migrate:fresh', ['--seed' => true]);
        $this->call('sync:docs');
        $this->call('sync:components');
        $this->call('sync:issues');
        $this->call('sync:contributors');
    }
}
