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
use App\Entity\Menu;
use App\Entity\Menu\FindableByUrn;
use App\Entity\Menu\Reader as MenuReader;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Console\Command;

/**
 * Class SyncMenuCommand
 */
class SyncMenuCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:menu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync menus from the docs directory';

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * SyncMenuCommand constructor.
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
        $this->comment('Processing navigation');

        foreach ($repositories->docs()->getDocumentationPages() as $page) {
            if ($page->isRoot()) {
                continue;
            }

            foreach ($this->getMenuItems($repositories->menuByUrn(), $page) as $depth => $menu) {
                $documentation = $repositories->docsByUrn()->findByUrn($menu->getUrn());

                $menu->withDocumentation($documentation);

                $this->notify($menu, $depth, $documentation);

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
     * @param int $depth
     * @param Documentation|null $documentation
     * @param Menu $menu
     */
    private function notify(Menu $menu, int $depth = 0, ?Documentation $documentation): void
    {
        $prefix = \str_repeat(' ', $depth * 4);
        $suffix = $documentation ? \sprintf(' as child of %d ', $documentation->getId()) : ' as tab ';

        $this->comment($prefix . '<info>' . $menu->getUrn() . '</info>' . $suffix);
    }

    /**
     * @param FindableByUrn $menus
     * @param Documentation $page
     * @return \Traversable|Menu[]
     */
    private function getMenuItems(FindableByUrn $menus, Documentation $page): \Traversable
    {
        return MenuReader::fromDocumentation($menus, $page)
            ->toMenus();
    }
}

