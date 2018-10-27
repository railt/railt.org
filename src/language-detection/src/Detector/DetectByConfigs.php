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
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;

/**
 * Class DetectByConfigs
 */
class DetectByConfigs implements DetectorInterface
{
    /**
     * @var FindableByCode
     */
    private $languages;

    /**
     * @var Repository
     */
    private $config;

    /**
     * DetectByConfigs constructor.
     * @param FindableByCode $languages
     * @param Repository $config
     */
    public function __construct(FindableByCode $languages, Repository $config)
    {
        $this->languages = $languages;
        $this->config = $config;
    }

    /**
     * @param Repository $config
     * @return array|string[]
     */
    private function getLanguages(Repository $config): array
    {
        $languages = [$config->get('app.locale'), $config->get('app.fallback_locale')];

        return \array_filter(\array_filter($languages), function (string $language) {
            return \strlen($language) === 2;
        });
    }

    /**
     * @param Request $request
     * @return Language|null
     */
    public function detect(Request $request): ?Language
    {
        [$lang, $fallback] = $this->getLanguages($this->config);

        return $this->languages->findByCode($lang, $fallback);
    }
}
