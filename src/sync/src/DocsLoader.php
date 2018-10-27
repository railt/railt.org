<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Sync;

use App\Entity\Document;
use App\Entity\Language;
use App\Entity\Repositories\DocumentRepository;
use App\Entity\Repositories\LanguageRepository;
use Sync\Repository\RepositoryInterface;

/**
 * Class Loader
 */
class DocsLoader
{
    /**
     * @var RepositoryInterface
     */
    private $repo;

    /**
     * @var LanguageRepository
     */
    private $languages;

    /**
     * Loader constructor.
     * @param RepositoryInterface $repo
     * @param LanguageRepository $languages
     */
    public function __construct(RepositoryInterface $repo, LanguageRepository $languages)
    {
        $this->repo = $repo;
        $this->languages = $languages;
    }

    /**
     * @param DocumentRepository $docs
     * @return \Generator|Document[]
     */
    public function load(DocumentRepository $docs): iterable
    {
        foreach ($this->repo as $page) {
            $language = $this->language($page->getLanguage());

            $entity = $docs->findByLanguageAndUrn($language, $page->getUrn());

            if (! $entity) {
                $entity = new Document($language);
                $entity->moveTo($page->getUrn());
                $entity->update($page->getContents(), $page->getHash());
            }

            yield $entity;
        }
    }

    /**
     * @param string $code
     * @return Language
     */
    private function language(string $code): Language
    {
        return $this->languages->findByCode($code);
    }
}
