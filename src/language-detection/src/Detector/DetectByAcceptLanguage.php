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
 * Class DetectByAcceptLanguage
 */
class DetectByAcceptLanguage implements DetectorInterface
{
    /**
     * @var int
     */
    private const MAX_ARGUMENTS = 2;

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
        $lang = $this->getLanguageStrings($request);

        return $lang->when($lang->count() === self::MAX_ARGUMENTS,
            //
            // If Accept-Language provides 2 languages
            //
            function(Collection $accept): ?Language {
                return $this->languages->findByCode($accept->first(), $accept->last());
            },
            //
            // Otherwise
            //
            function (Collection $accept): ?Language {
                return $this->languages->findByCode($accept->first());
            });
    }

    /**
     * @param Request $request
     * @return Collection
     */
    private function getLanguageStrings(Request $request): Collection
    {
        return \collect($request->getLanguages())
            //
            // Allow only 2-char languages
            //
            ->filter(function (string $lang): bool {
                return \strlen($lang) === self::MAX_ARGUMENTS;
            })
            //
            // Transform to lower case
            //
            ->map(function (string $lang): string {
                return \strtolower($lang);
            })
            //
            // Allow only 2 variants
            //
            ->take(self::MAX_ARGUMENTS);
    }
}
