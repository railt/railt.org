<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\Domain\Documentation\Menu\ExternalLink;
use App\Domain\Documentation\Menu\PageLink;
use Doctrine\Persistence\ObjectManager;

final class Synchronizer
{
    /**
     * @psalm-taint-sink file $directory
     * @param non-empty-string $directory
     */
    public function __construct(
        private readonly string $directory,
        private readonly MenuRepositoryInterface $menus,
        private readonly PageRepositoryInterface $pages,
        private readonly ObjectManager $em,
    ) {
    }

    public function truncate(): void
    {
        foreach ($this->menus->findAll() as $menu) {
            $this->em->remove($menu);
        }

        foreach ($this->pages->findAll() as $page) {
            $this->em->remove($page);
        }

        $this->em->flush();
    }

    public function sync(): void
    {
        $menuPriority = 0;

        foreach ($this->getManifest() as $menuTitle => $items) {
            // Skip non-named items
            if ($menuTitle === '') {
                return;
            }

            $menu = $this->menus->findOneBy(['title' => $menuTitle])
                ?? new Menu($menuTitle);
            $menu->setPriority($menuPriority);

            $this->em->persist($menu);
            $this->em->flush();

            foreach ($items as $linkTitle => $linkPath) {
                $page = $this->fetchPath($linkTitle, $linkPath);

                if ($page !== null) {
                    $this->em->persist($page);
                    $this->em->flush();
                }

                $link = $page === null
                    ? new ExternalLink($menu, $linkPath, $linkTitle)
                    : new PageLink($page, $menu, $linkTitle)
                ;

                $this->em->persist($link);
                $this->em->flush();
            }
        }

        $this->em->flush();
    }

    private function getManifest(): array
    {
        $pathname = $this->directory . '/manifest.json';

        if (!\is_file($pathname)) {
            throw new \InvalidArgumentException('Manifest file not found');
        }

        $contents = \file_get_contents($pathname);

        return (array)\json_decode($contents, true, 512, \JSON_THROW_ON_ERROR);
    }

    private function fetchPath(string $title, string $path): ?Page
    {
        $pathname = $this->directory . '/' . $path . '.md';

        if (!\is_file($pathname)) {
            return null;
        }

        $page = $this->pages->findByPath($path)
            ?? new Page($title, $path);

        $content = $page->getContent();
        $content->update(\file_get_contents($pathname));

        return $page;
    }
}
