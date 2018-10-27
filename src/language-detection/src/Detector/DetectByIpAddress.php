<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace LanguageDetection\Detector;

use App\Entity\Country;
use App\Entity\CountryZone;
use App\Entity\Language;
use App\Entity\Repositories\CountryZoneRepository;
use Illuminate\Http\Request;

/**
 * Class DetectByIpAddress
 */
class DetectByIpAddress implements DetectorInterface
{
    /**
     * @var CountryZoneRepository
     */
    private $zones;

    /**
     * @var null|string
     */
    private $virtualIpAddress;

    /**
     * DetectByIpAddress constructor.
     * @param CountryZoneRepository $zones
     * @param null|string $virtualIpAddress
     */
    public function __construct(CountryZoneRepository $zones, string $virtualIpAddress = null)
    {
        $this->zones            = $zones;
        $this->virtualIpAddress = $virtualIpAddress;
    }

    /**
     * @param Request $request
     * @return Language|null
     */
    public function detect(Request $request): ?Language
    {
        return $this->detectByRequest($request);
    }

    /**
     * @param Request $request
     * @return Language
     */
    private function detectByRequest(Request $request): ?Language
    {
        $zone = $this->zones->findByIp($this->extractIpAddress($request));

        return $zone ? $this->detectByCountryZone($zone) : null;
    }

    /**
     * @param Request $request
     * @return string
     */
    private function extractIpAddress(Request $request): string
    {
        return $this->virtualIpAddress ?? $request->ip();
    }

    /**
     * @param CountryZone $zone
     * @return Language
     */
    private function detectByCountryZone(CountryZone $zone): ?Language
    {
        $country = $zone->getCountry();

        return $country ? $this->detectByCountry($country) : null;
    }

    /**
     * @param Country $country
     * @return Language
     */
    private function detectByCountry(Country $country): ?Language
    {
        $language = $country->getLanguage();

        return $language ? $language->autodetect() : null;
    }

}
