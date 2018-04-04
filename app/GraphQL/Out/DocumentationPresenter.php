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
use Carbon\Carbon;

/**
 * Class DocumentationPresenter
 */
class DocumentationPresenter
{
    /**
     * @param Documentation $docs
     * @return iterable
     */
    public function fromEntity(Documentation $docs): iterable
    {
        yield 'id' => $docs->getId();
        yield 'title' => $docs->getTitle();
        yield 'content' => $docs->getContent()->toHtml();

        yield 'urn' => $docs->getUrn();
        yield 'url' => \sprintf('https://github.com/railt/docs/%s', $docs->getPath());

        yield 'updatedAt' => $docs->updatedAt() ?? $docs->createdAt();

        yield 'nav' => $docs->getNavigation();
    }
}
