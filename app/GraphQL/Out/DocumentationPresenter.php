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
use App\Entity\File\GithubRepository;
use App\Entity\Language;
use Carbon\Carbon;

/**
 * Class DocumentationPresenter
 */
class DocumentationPresenter
{
    /**
     * @var Language
     */
    private $current;

    /**
     * DocumentationPresenter constructor.
     * @param Language $current
     */
    public function __construct(Language $current)
    {
        $this->current = $current;
    }

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
        yield 'url' => $this->getGitHubUrl($docs);
        yield 'isFallback' => $docs->getLanguage()->getId() !== $this->current->getId();
        yield 'updatedAt' => $docs->updatedAt() ?? $docs->createdAt();
        yield 'nav' => $docs->getNavigation();
    }

    /**
     * @param Documentation $docs
     * @return string
     */
    private function getGitHubUrl(Documentation $docs): string
    {
        return \vsprintf('https://github.com/%s/%s/blob/%s/%s', [
            GithubRepository::GITHUB_USERNAME,
            GithubRepository::GITHUB_REPOSITORY,
            GithubRepository::GITHUB_BRANCH,
            $docs->getPath()
        ]);
    }
}
