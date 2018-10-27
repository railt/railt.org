<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Console\Commands;

use App\Entity\Document;
use App\Entity\Repositories\DocumentRepository as Documents;
use App\Entity\Repositories\LanguageRepository as Languages;
use App\Entity\Repositories\MenuRepository as Menus;
use Doctrine\ORM\EntityManagerInterface;
use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Sync\DocsLoader;
use Sync\MenuLoader;
use Sync\Repository\GitHubRepository;

/**
 * Class SyncCommand
 */
class SyncCommand extends Command
{
    /**
     * @var string
     */
    private const PROGRESS_FORMAT = ' %current%/%max% [%bar%] %message%';

    /**
     * @var string
     */
    protected $name = 'docs:sync';

    /**
     * @param EntityManagerInterface $em
     * @return void
     * @throws \LogicException
     */
    public function handle(EntityManagerInterface $em): void
    {
        $app = $this->getLaravel();

        foreach ($app->call(\Closure::fromCallable([$this, 'loadDocument'])) as $page) {
            $em->persist($page);
            $em->flush();
        }

        foreach ($app->call(\Closure::fromCallable([$this, 'loadMenus'])) as $menu) {
            $em->persist($menu);
            $em->flush();
        }
    }

    /**
     * @param Documents $docs
     * @param Menus $menus
     * @return iterable
     * @throws \LogicException
     */
    private function loadMenus(Documents $docs, Menus $menus): iterable
    {
        $this->output->writeln('<comment>Synchronization:</comment> Menu');

        $progress = new ProgressBar($this->output, $menus->query->count());
        $progress->setFormat(self::PROGRESS_FORMAT);

        $loader = new MenuLoader($docs);

        foreach ($loader->load($menus) as $i => $menu) {
            /** @noinspection DisconnectedForeachInstructionInspection */
            $progress->advance();
            $progress->setMessage($menu->getUrn());

            yield $menu;
        }

        $progress->clear();

        $this->output->writeln('<info>Synchronized:</info> Menu (' . ($i ?? 0) . ' items)');
    }

    /**
     * @param GitHubManager $github
     * @param Languages $languages
     * @param Documents $docs
     * @return Document[]|iterable
     * @throws \LogicException
     */
    private function loadDocument(GitHubManager $github, Languages $languages, Documents $docs): iterable
    {
        $this->output->writeln('<comment>Synchronization:</comment> Documentation');

        $progress = new ProgressBar($this->output, $docs->query->count());
        $progress->setFormat(self::PROGRESS_FORMAT);

        $loader = new DocsLoader(new GitHubRepository($github, 'railt', 'docs'), $languages);

        foreach ($loader->load($docs) as $i => $page) {
            /** @noinspection DisconnectedForeachInstructionInspection */
            $progress->advance();
            $progress->setMessage($page->getUrn());

            yield $page;
        }

        $progress->clear();

        $this->output->writeln('<info>Synchronized:</info> Documentation (' . ($i ?? 0) . ' items)');
    }
}
