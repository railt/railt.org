<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repositories\LanguageRepository;

use App\Entity\Language;

/**
 * Interface FindableByCode
 */
interface FindableByCode
{
    /**
     * @param string $code
     * @param string|null $fallback
     * @return Language|null
     */
    public function findByCode(string $code, string $fallback = null): ?Language;
}
