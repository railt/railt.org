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
 * Class SyncDocsCommand
 */
class SyncDocsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:docs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync documentation pages from the resources directory';

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * DocsSyncCommand constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param RepositoriesLocator $repositories
     * @return void
     */
    public function handle(RepositoriesLocator $repositories): void
    {
        $this->comment('Processing documentation');

        foreach ($this->files() as $file) {
            $language = LanguageReader::fromSplFileInfo($repositories->langByName(), $file)
                ->toLanguage();

            $documentation = DocumentationReader::fromSplFileInfo($repositories->docsByPath(), $file)
                ->toDocumentation()
                ->withLanguage($language);

            $this->notify($documentation);

            $this->em->persist($documentation);
        }

        $this->em->flush();

        $this->line('<fg=white;bg=green;options=bold> Complete! </>' . "\n\n");
    }

    /**
     * @param Documentation $documentation
     */
    private function notify(Documentation $documentation): void
    {
        $this->comment(' - Reading <info>' . $documentation->getPath() . '</info>');
    }

    /**
     * @return \Traversable|SplFileInfo[]
     */
    private function files(): \Traversable
    {
        yield from (new Finder())
            ->files()
            ->name('*.md')
            ->in(\resource_path('docs'));
    }
}
