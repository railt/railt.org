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
use App\Entity\Repositories\LanguageRepository\FindableByCode;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Class DetectByDomain
 */
class DetectByDomain implements DetectorInterface
{
    /**
     * @var FindableByCode
     */
    private $languages;

    /**
     * DetectByAcceptLanguage constructor.
     * @param FindableByCode $languages
     */
    public function __construct(FindableByCode $languages)
    {
        $this->languages = $languages;
    }

    /**
     * @param Request $request
     * @return Language|null
     */
    public function detect(Request $request): ?Language
    {
        $result = (int)\preg_match('/^(?<lang>\w+)\.\w+\.\w+$/', $request->getHost(), $matches);

        if ($result === 0) {
            return null;
        }

        return $this->languages->findByCode($matches['lang']);
    }
}
