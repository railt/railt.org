<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace LanguageDetection\Detector;

use App\Entity\Language;
use Illuminate\Http\Request;

/**
 * Interface DetectorInterface
 */
interface DetectorInterface
{
    /**
     * @param Request $request
     * @return Language|null
     */
    public function detect(Request $request): ?Language;
}
