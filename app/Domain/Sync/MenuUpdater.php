<?php

declare(strict_types=1);

namespace App\Domain\Sync;

use App\Domain\Menu;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\Mapping\MappingException;
use Symfony\Component\Console\Output\OutputInterface;

class MenuUpdater extends Updater
{
    /**
     * @param string $directory
     * @param OutputInterface $out
     * @throws MappingException
     * @throws ORMException
     * @throws OptimisticLockException
     * @throws \JsonException
     */
    public function update(string $directory, OutputInterface $out): void
    {
        $order = 0;
        foreach ($this->getNavigation($directory) as $title => $children) {
            $menu = new Menu($title);
            $menu->setPriority($order++);

            $sub = 0;
            foreach ($children as $subtitle => $url) {
                $child = new Menu($subtitle, $url);
                $child->setPriority($sub++);
                $child->setParent($menu);

                $this->em->persist($child);
            }

            $this->em->persist($menu);
        }

        $this->em->flush();
        $this->em->clear();
    }

    /**
     * @param string $directory
     * @return array
     * @throws \JsonException
     */
    private function getNavigation(string $directory): array
    {
        if (! \is_file($manifest = $directory . '/manifest.json')) {
            throw new \LogicException('Manifest file not found');
        }

        return \json_decode(\file_get_contents($manifest), true, 512, \JSON_THROW_ON_ERROR);
    }
}
