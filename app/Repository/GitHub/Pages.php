<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\GitHub;

use App\Entity\Language;
use App\Entity\Page;
use App\Entity\Document;
use Doctrine\ORM\Mapping\ClassMetadata;
use Github\Client;
use Serafim\Hydrogen\Collection;
use App\Repository\PagesRepository;
use App\Repository\GitHub\Pages\File;
use Doctrine\ORM\EntityManagerInterface as Em;
use App\Entity\Page\Renderer as Factory;

/**
 * Class Pages
 */
class Pages extends GitHubRepository implements PagesRepository
{
    /**
     * @var Factory
     */
    private $factory;

    /**
     * Pages constructor.
     * @param Em $em
     * @param Client $github
     * @param Factory $factory
     * @param ClassMetadata $meta
     */
    public function __construct(Em $em, Client $github, Factory $factory, ClassMetadata $meta)
    {
        $this->meta = $meta;
        $this->github = $github;
        $this->factory = $factory;
        $this->processor = $this->getProcessor($em);
    }

    /**
     * @param Document $document
     * @param string $path
     * @return Page
     */
    public function findOneByPath(Document $document, string $path): Page
    {
        return $this->findAllByDocument($document)
            ->first(function(Page $page) use ($path): bool {
                return $page->getPath() === $path;
            });
    }

    /**
     * @param Language $language
     * @param string $slug
     * @return Page|null
     * @throws \LogicException
     */
    public function findOneBySlug(Language $language, string $slug): ?Page
    {
        throw new \LogicException(__METHOD__ . ' not implemented yet');
    }

    /**
     * @param Document $document
     * @return Collection|Page[]
     */
    public function findAllByDocument(Document $document): Collection
    {
        return Collection::make(File::all($this->github, $document->getSource()))
            ->map->toPage($document, $this->factory);
    }
}
