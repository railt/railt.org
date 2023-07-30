<?php

declare(strict_types=1);

namespace App\Command;

use App\Sync\DocsUpdater;
use App\Sync\MenuUpdater;
use App\Sync\SearchIndexUpdater;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DocsUpdateCommand extends Command
{
    /**
     * @var string
     */
    private string $directory;

    /**
     * @var MenuUpdater
     */
    private MenuUpdater $menu;

    /**
     * @var DocsUpdater
     */
    private DocsUpdater $docs;

    /**
     * @var SearchIndexUpdater
     */
    private SearchIndexUpdater $search;

    /**
     * @param string $directory
     * @param MenuUpdater $menu
     * @param DocsUpdater $docs
     * @param SearchIndexUpdater $search
     */
    public function __construct(string $directory, MenuUpdater $menu, DocsUpdater $docs, SearchIndexUpdater $search)
    {
        $this->directory = $directory;
        $this->menu = $menu;
        $this->docs = $docs;
        $this->search = $search;

        parent::__construct('docs:update');
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'docs:update';
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws \Throwable
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->menu->truncate();
        $this->docs->truncate();
        $this->search->truncate();

        $this->menu->update($this->directory, $output);
        $this->docs->update($this->directory, $output);
        $this->search->update($output);

        return Command::SUCCESS;
    }
}
