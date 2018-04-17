<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\Documentation;
use Github\Client;
use Illuminate\Console\Command;
use Illuminate\Contracts\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class DownloadCommand
 */
class SyncDocsDownloadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'documentation:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download a new version of documentation from github';

    /**
     * @var Filesystem
     */
    private $fs;

    /**
     * @var Client
     */
    private $github;

    /**
     * SyncDocsDownloadCommand constructor.
     * @param Filesystem $fs
     * @param Client $github
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    public function __construct(Filesystem $fs, Client $github)
    {
        $this->fs = $fs;
        $this->github = $github;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    public function handle(): void
    {
        $this->comment('Flush directory');
        //$this->clear();
        $this->line('<fg=white;bg=green;options=bold> Complete! </>' . "\n\n");

        $this->comment('Download new files');
    }

    /**
     * @return void
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    private function clear(): void
    {
        $root = \resource_path(Documentation::STORAGE_DIRECTORY);

        $files = \iterator_to_array((new Finder())->in($root));

        $files = \array_map(function(SplFileInfo $file): string {
            return \str_replace('\\', '/', $file->getRealPath());
        }, $files);

        \usort($files, function (string $a, string $b) {
            return \substr_count($b, '/') <=> \substr_count($a, '/');
        });

        foreach ($files as $file) {
            $this->info(' - Remove ' . $file);
            if (\is_file($file)) {
                \unlink($file);
            } else {
                \rmdir($file);
            }
        }
    }
}
