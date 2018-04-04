<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console\Commands;

use App\Console\Commands\Common\RepositoriesLocator;
use App\Entity\Documentation;
use App\Entity\Documentation\Reader as DocumentationReader;
use App\Entity\Language\Reader as LanguageReader;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

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
     */
    public function handle(): void
    {
        $this->call('sync:docs');
        $this->call('sync:menu');
    }
}
