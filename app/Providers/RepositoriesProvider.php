<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use App\Entity\AuthenticationService;
use App\Entity\AuthenticationService\Repository as AuthenticationServiceRepository;
use App\Entity\Documentation;
use App\Entity\Documentation\Repository as DocumentationRepository;
use App\Entity\Language;
use App\Entity\Language\Repository as LanguageRepository;
use App\Entity\Menu;
use App\Entity\Menu\Repository as MenuRepository;
use App\Entity\User;
use App\Entity\User\Repository as UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoriesProvider
 */
final class RepositoriesProvider extends ServiceProvider
{
    private const REPOSITORY = 0x00;
    private const REPOSITORY_ALIASES = 0x01;

    private const REPOSITORIES_MAP = [
        Language::class              => [
            self::REPOSITORY         => LanguageRepository::class,
            self::REPOSITORY_ALIASES => [
                Language\FindableByName::class,
                Language\ContainsLanguages::class,
            ],
        ],
        Documentation::class         => [
            self::REPOSITORY         => DocumentationRepository::class,
            self::REPOSITORY_ALIASES => [
                Documentation\FindableByUrn::class,
                Documentation\FindableByPath::class,
                Documentation\ContainsDocumentationPages::class,
            ],
        ],
        Menu::class                  => [
            self::REPOSITORY         => MenuRepository::class,
            self::REPOSITORY_ALIASES => [
                Menu\FindableByParents::class,
                Menu\FindableByUrn::class,
            ],
        ],
        User::class                  => [
            self::REPOSITORY         => UsersRepository::class,
            self::REPOSITORY_ALIASES => [
                User\FindableById::class,
                User\FindableByLogin::class,
                User\FindableByEmail::class,
                User\CreatableFromSocialite::class,
            ],
        ],
        AuthenticationService::class => [
            self::REPOSITORY         => AuthenticationServiceRepository::class,
            self::REPOSITORY_ALIASES => [
                User\FindableByService::class,
            ],
        ],
    ];

    /**
     * @param EntityManagerInterface $em
     */
    public function boot(EntityManagerInterface $em): void
    {
        foreach (self::REPOSITORIES_MAP as $class => $info) {
            $this->app->singleton($info[self::REPOSITORY], function () use ($class, $em) {
                return $em->getRepository($class);
            });

            foreach ((array)($info[self::REPOSITORY_ALIASES] ?? []) as $alias) {
                $this->app->alias($info[self::REPOSITORY], $alias);
            }
        }
    }
}
