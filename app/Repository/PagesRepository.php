<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Document;
use App\Entity\Language;
use App\Entity\Page;
use App\Mapping as ORM;
use Serafim\Hydrogen\Collection;
use App\Repository\GitHub\Pages as GitHub;
use App\Repository\Database\Pages as Database;
use Serafim\Hydrogen\Repository\ObjectRepository;

/**
 * @ORM\Repository(entity=Page::class, classes={
 *      Database::class,
 *      GitHub::class,
 * })
 */
interface PagesRepository extends ObjectRepository
{
    /**
     * @param Document $document
     * @param string $path
     * @return Page
     */
    public function findOneByPath(Document $document, string $path): Page;

    /**
     * @param Language $language
     * @param string $slug
     * @return Page|null
     */
    public function findOneBySlug(Language $language, string $slug): ?Page;

    /**
     * @param Document $document
     * @return Collection
     */
    public function findAllByDocument(Document $document): Collection;
}
