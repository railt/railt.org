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
use App\Entity\Documentation\FindableByPath;
use App\Entity\File;
use App\Entity\File\LocalRepository;
use App\Entity\Language;
use App\Entity\Language\FindableByName;
use App\Entity\Menu;
use App\Entity\Menu\FindableByUrn;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;
use Illuminate\Contracts\Container\Container;

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
    protected $signature = 'documentation:sync';

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
     * @var Container
     */
    private $app;

    /**
     * DocsSyncCommand constructor.
     * @param EntityManagerInterface $em
     * @param Container $app
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    public function __construct(EntityManagerInterface $em, Container $app)
    {
        $this->em = $em;
        $this->app = $app;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param LocalRepository $files
     * @return void
     * @throws \LogicException
     * @throws \RuntimeException
     */
    public function handle(LocalRepository $files): void
    {
        $i = 0;
        foreach ($files->getFiles() as $i => $file) {
            $language = $this->syncLanguage($file);
            $this->output->write("\r" . '<comment>Processing documentation:</comment> ' . $i);

            $this->syncDocumentation($file, $language);
        }
        $this->em->flush();
        $this->line("\r" . '<info>Processed documentation:</info>  <fg=white;bg=green;options=bold> OK (' . $i . ') </>');


        $i = 0;
        foreach ($files->getFiles() as $file) {
            foreach ($this->syncMenu($file) as $menu) {
                $this->output->write("\r" . '<comment>Processing menu:</comment> ' . ++$i);
            }
        }
        $this->em->flush();
        $this->line("\r" . '<info>Processed menu:</info>  <fg=white;bg=green;options=bold> OK (' . $i . ') </>');
    }

    /**
     * @param File $file
     * @return \Generator|Menu[]
     */
    private function syncMenu(File $file)
    {
        $docs = $this->app->make(Documentation\FindableByUrn::class);

        $menus = $file->getMenus($this->app->make(FindableByUrn::class));

        foreach ($menus as $menu) {
            $documentation = $docs->findByUrn($menu->getUrn());

            if ($documentation) {
                $menu->withDocumentation($documentation);

                if ($menu->isNew()) {
                    $menu->rename($documentation->getTitle() ?? $menu->getTitle());
                }
            }

            $this->em->persist($menu);

            if ($menu->isNew()) {
                $this->em->flush();
            }

            yield $menu;
        }
    }

    /**
     * @param File $file
     * @param Language $language
     * @return Documentation
     */
    private function syncDocumentation(File $file, Language $language): Documentation
    {
        $documentation = $file
            ->getDocumentation($this->app->make(FindableByPath::class))
            ->withLanguage($language);

        $this->em->persist($documentation);
        $this->em->flush();

        return $documentation;
    }

    /**
     * @param File $file
     * @return Language
     */
    private function syncLanguage(File $file): Language
    {
        $language = $file->getLanguage($this->app->make(FindableByName::class));

        if ($language->isNew()) {
            $this->em->persist($language);
            $this->em->flush();
        }

        return $language;
    }
}
