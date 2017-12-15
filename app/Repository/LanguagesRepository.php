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
use App\Entity\Language;
use Serafim\Hydrogen\Repository\ObjectRepository;
use App\Repository\Database\Languages as Database;

/**
 * @ORM\Repository(entity=Language::class, classes={
 *      Database::class,
 * })
 */
interface LanguagesRepository extends ObjectRepository
{
    /**
     * @param string $code
     * @return null|Language
     */
    public function findOneByCode(string $code): ?Language;

    /**
     * @return Language
     * @throws \LogicException
     */
    public function findDefault(): Language;
}
