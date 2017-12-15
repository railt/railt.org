<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository;

use App\Mapping as ORM;
use App\Entity\Document;
use Serafim\Hydrogen\Repository\ObjectRepository;
use App\Repository\Database\Docs as Database;

/**
 * @ORM\Repository(entity=Document::class, classes={
 *      Database::class,
 * })
 */
interface DocsRepository extends ObjectRepository
{
    /**
     * @param string $lang
     * @return Document|null
     */
    public function findOneByLanguage(string $lang): ?Document;
}
