<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\GraphQL\Out;

use App\Entity\Documentation;
use App\Entity\Documentation\Link;
use Carbon\Carbon;

/**
 * Class DocumentationPresenter
 */
class DocumentationPresenter
{
    /**
     * @param Documentation $docs
     * @return array
     */
    public function documentToArray(Documentation $docs): array
    {
        /** @var Carbon $updated */
        $updated = $docs->updatedAt() ?? $docs->createdAt();

        return [
            'id'                 => $docs->getId(),
            'urn'                => $docs->getUrn(),
            'url'                => \sprintf('https://github.com/railt/docs/%s', $docs->getPath()),
            'title'              => $docs->getTitle(),
            'content'            => $docs->getContent()->toHtml(),
            'updatedAt'          => $updated->toRfc3339String(),
            'updatedAtForHumans' => $updated->diffForHumans(),
            'nav'                => \iterator_to_array($docs->getNavigation()),
        ];
    }

    /**
     * @param Link $nav
     * @return array
     */
    public function navToArray(Link $nav): array
    {
        return [
            'slug'  => $nav->getSlug(),
            'level' => $nav->getLevel(),
            'title' => $nav->getTitle(),
        ];
    }
}
