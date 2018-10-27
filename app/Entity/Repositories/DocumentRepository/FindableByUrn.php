<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repositories\DocumentRepository;

use App\Entity\Document;
use App\Entity\Language;

/**
 * Interface FindableByUrn
 */
interface FindableByUrn
{
    /**
     * @param string $urn
     * @return Document|null
     */
    public function findByUrn(string $urn): ?Document;

    /**
     * @param Language $lang
     * @param string $urn
     * @return null|Document
     */
    public function findByLanguageAndUrn(Language $lang, string $urn): ?Document;
}
