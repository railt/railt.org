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
use App\Entity\File\GithubRepository;
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
     * @var GithubRepository
     */
    private $github;

    /**
     * SyncDocsDownloadCommand constructor.
     * @param Filesystem $fs
     * @param GithubRepository $github
     */
    public function __construct(Filesystem $fs, GithubRepository $github)
    {
        $this->fs = $fs;
        $this->github = $github;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     * @throws \Github\Exception\InvalidArgumentException
     * @throws \LogicException
     * @throws \InvalidArgumentException
     * @throws \Github\Exception\ErrorException
     */
    public function handle(): void
    {
        $this->output->write('<comment>Flush directory:</comment>   ...');
        $this->clear();
        $this->line("\r" . '<info>Flushed directory:</info> <fg=white;bg=green;options=bold> OK </>');


        $i = 0;
        foreach ($this->github->getFiles() as $file) {
            $this->output->write("\r" . '<comment>Downloading files:</comment> ' . ++$i);
            $pathName  = $this->getDirectory($file->getRelativePathName());
            $directory = \dirname($pathName);

            if (! @\mkdir($directory, 0777, true) && ! \is_dir($directory)) {
                throw new \LogicException('Could not create directory ' . $pathName);
            }

            \file_put_contents($pathName, $file->getContent());
        }

        $this->line("\r" . '<info>Downloaded files:</info>  <fg=white;bg=green;options=bold> OK (' . $i . ') </>');
    }

    /**
     * @param string $suffix
     * @return string
     */
    private function getDirectory(string $suffix = ''): string
    {
        return \resource_path(Documentation::STORAGE_DIRECTORY . '/' . $suffix);
    }

    /**
     * @throws \LogicException
     * @throws \InvalidArgumentException
     */
    private function clear(): void
    {
        $files = \iterator_to_array((new Finder())->in($this->getDirectory()));

        $files = \array_map(function(SplFileInfo $file): string {
            return \str_replace('\\', '/', $file->getRealPath());
        }, $files);

        \usort($files, function (string $a, string $b) {
            return \substr_count($b, '/') <=> \substr_count($a, '/');
        });

        foreach ($files as $file) {
            if (\is_file($file)) {
                \unlink($file);
            } else {
                \rmdir($file);
            }
        }
    }
}
