<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Documentation;

use App\Entity\Language;
use RDS\Hydrogen\Query;

/**
 * Interface SelectableByLanguage
 */
interface SelectableByLanguage
{
    /**
     * @param Language $language
     * @return Query|$this
     */
    public function withLanguage(Language $language): Query;
}
