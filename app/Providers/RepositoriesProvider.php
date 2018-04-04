<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use App\Entity\Documentation;
use App\Entity\Language;
use App\Entity\Menu;
use App\Entity\Repository\DocumentationRepository;
use App\Entity\Repository\LanguageRepository;
use App\Entity\Repository\MenuRepository;
use App\Entity\Repository\ProvidesDocumentation;
use App\Entity\Repository\ProvidesLanguage;
use App\Entity\Repository\ProvidesMenu;
use App\Entity\Repository\ProvidesMenuTree;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoriesProvider
 */
final class RepositoriesProvider extends ServiceProvider
{
    private const REPOSITORY = 0x00;
    private const REPOSITORY_ALIASES = 0x01;

    private $repositories = [
        Language::class      => [
            self::REPOSITORY         => LanguageRepository::class,
            self::REPOSITORY_ALIASES => ProvidesLanguage::class,
        ],
        Documentation::class => [
            self::REPOSITORY         => DocumentationRepository::class,
            self::REPOSITORY_ALIASES => ProvidesDocumentation::class,
        ],
        Menu::class => [
            self::REPOSITORY         => MenuRepository::class,
            self::REPOSITORY_ALIASES => [ProvidesMenu::class, ProvidesMenuTree::class]
        ],
    ];

    /**
     * @param EntityManagerInterface $em
     */
    public function boot(EntityManagerInterface $em): void
    {
        foreach ($this->repositories as $class => $info) {
            $this->app->singleton($info[self::REPOSITORY], function () use ($class, $em) {
                return $em->getRepository($class);
            });

            foreach ((array)$info[self::REPOSITORY_ALIASES] as $alias) {
                $this->app->alias($info[self::REPOSITORY], $alias);
            }
        }
    }
}
