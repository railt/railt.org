<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\Database;

use App\Entity\Document;
use Serafim\Hydrogen\Repository\DatabaseRepository;
use App\Repository\DocsRepository as DocsRepositoryInterface;

/**
 * Class DocsDBRepository
 */
class Docs extends DatabaseRepository implements DocsRepositoryInterface
{
    /**
     * @param string $lang
     * @return Document|null|object
     * @throws \LogicException
     */
    public function findOneByLanguage(string $lang): ?Document
    {
        return $this->query()->where('lang.code', $lang)->first();
    }
}
