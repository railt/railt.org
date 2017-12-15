<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Repository\Database;

use App\Entity\Language;
use Serafim\Hydrogen\Repository\DatabaseRepository;
use App\Repository\LanguagesRepository as LanguagesRepositoryInterface;

/**
 * Class LanguagesDBRepository
 */
class Languages extends DatabaseRepository implements LanguagesRepositoryInterface
{
    /**
     * @param string $code
     * @return Language|null|object
     * @throws \LogicException
     */
    public function findOneByCode(string $code): ?Language
    {
        return $this->query()->where('code', $code)->first();
    }

    /**
     * @return Language|object
     * @throws \LogicException
     */
    public function findDefault(): Language
    {
        $default = $this->query()->where('default', true)->first();

        if ($default === null) {
            throw new \LogicException('Languages table must provide one default record');
        }

        return $default;
    }
}
