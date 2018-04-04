<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\Documentation\Reader as DocumentationReader;
use App\Entity\Language\Reader as LanguageReader;
use App\Entity\Menu\Reader as MenuReader;
use App\Entity\Repository\ProvidesDocumentation;
use App\Entity\Repository\ProvidesLanguage;
use App\Entity\Repository\ProvidesMenu;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class DocsSyncCommand
 */
class DocsSyncCommand extends Command
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
     * @param ProvidesLanguage $languages
     * @param ProvidesDocumentation $docs
     * @param ProvidesMenu $menus
     * @return void
     */
    public function handle(
        ProvidesLanguage $languages,
        ProvidesDocumentation $docs,
        ProvidesMenu $menus
    ): void
    {
        $this->info('Processing documentation');

        foreach ($this->files() as $file) {
            $language = LanguageReader::fromSplFileInfo($languages, $file)->toLanguage();

            $documentation = DocumentationReader::fromSplFileInfo($docs, $file)
                ->toDocumentation()
                ->withLanguage($language);

            $this->em->persist($documentation);

            $this->comment('◂┈<fg=blue;options=bold>Page</>┈ <info>' . $documentation->getPath() . '</info>');
        }

        $this->em->flush();
        $this->line('<fg=white;bg=green;options=bold> Complete! </>' . "\n\n");


        $this->info('Processing navigation');
        foreach ($docs->findAll() as $d) {
            if ($d->isRoot()) {
                continue;
            }

            $items = MenuReader::fromDocumentation($menus, $d)->toMenus();

            foreach ($items as $i => $menu) {
                $documentation = $docs->findByUrn($menu->getUrn());
                $menu->withDocumentation($documentation);

                $prefix = $i ? \str_repeat(' ', $i * 3) . ' └┈' : '◂';
                $prefix2 = $documentation
                    ? \sprintf('┈<fg=blue;options=bold>%d</>┈ ', $documentation->getId())
                    : '┈<fg=red>❌</>┈ ';

                $this->comment($prefix . $prefix2 . '<info>' . $menu->getUrn() . '</info>');

                if ($documentation) {
                    $menu->rename($documentation->getTitle());
                }

                $this->em->persist($menu);
            }

            $this->em->flush();
        }

        $this->line('<fg=white;bg=green;options=bold> Complete! </>');
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
