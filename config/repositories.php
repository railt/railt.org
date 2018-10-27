<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

return [
    \App\Entity\User::class => [
        \App\Entity\Repositories\UserRepository::class,
        \App\Entity\Repositories\DatabaseUserRepository::class,
        // Behavioral
        \App\Entity\Repositories\UserRepository\FindableByEmail::class,
        \App\Entity\Repositories\UserRepository\FindableByLogin::class,
        \App\Entity\Repositories\UserRepository\CreatableFromSocialite::class,
    ],
    \App\Entity\UserAuthentication::class => [
        \App\Entity\Repositories\UserAuthenticationRepository::class,
        \App\Entity\Repositories\DatabaseUserAuthenticationRepository::class,
        // Behavioral
    ],
    \App\Entity\Country::class => [
        \App\Entity\Repositories\CountryRepository::class,
        \App\Entity\Repositories\DatabaseCountryRepository::class,
        // Behavioral
    ],
    \App\Entity\CountryZone::class => [
        \App\Entity\Repositories\CountryZoneRepository::class,
        \App\Entity\Repositories\DatabaseCountryZoneRepository::class,
        // Behavioral
        \App\Entity\Repositories\CountryZoneRepository\FindableByIp::class,
    ],
    \App\Entity\Language::class => [
        \App\Entity\Repositories\LanguageRepository::class,
        \App\Entity\Repositories\DatabaseLanguageRepository::class,
        // Behavioral
        \App\Entity\Repositories\LanguageRepository\FindableByCode::class,
    ],
    \App\Entity\Menu::class     => [
        \App\Entity\Repositories\MenuRepository::class,
        \App\Entity\Repositories\DatabaseMenuRepository::class,
        // Behavioral
        \App\Entity\Repositories\MenuRepository\ContainsRootMenus::class,
        \App\Entity\Repositories\MenuRepository\FindableByUrn::class,
    ],
    \App\Entity\Document::class => [
        \App\Entity\Repositories\DocumentRepository::class,
        \App\Entity\Repositories\DatabaseDocumentRepository::class,
        // Behavioral
        \App\Entity\Repositories\DocumentRepository\FindableByUrn::class,
    ],
    \App\Entity\Article::class => [
        \App\Entity\Repositories\ArticleRepository::class,
        \App\Entity\Repositories\DatabaseArticleRepository::class,
        // Behavioral
    ],
];
