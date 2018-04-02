<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\Language;
use App\Entity\Language\Reader as LanguageReader;
use App\Entity\Documentation\Reader as DocumentationReader;
use App\Entity\Repository\ProvidesDocumentation;
use App\Entity\Repository\ProvidesLanguage;
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
    protected $signature = 'docs:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync documentation pages from the resources directory';

    /**
     * Execute the console command.
     *
     * @param ProvidesLanguage $languages
     * @param ProvidesDocumentation $docs
     * @param EntityManagerInterface $em
     * @return void
     */
    public function handle(ProvidesLanguage $languages, ProvidesDocumentation $docs, EntityManagerInterface $em): void
    {
        foreach ($this->files() as $file) {
            $language = LanguageReader::fromSplFileInfo($languages, $file)->toLanguage();

            $documentation = DocumentationReader::fromSplFileInfo($docs, $file)
                ->toDocumentation()
                ->withLanguage($language);

            $em->persist($documentation);
        }

        $em->flush();
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
