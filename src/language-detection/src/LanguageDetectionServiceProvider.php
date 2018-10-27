<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace LanguageDetection;

use App\Entity\Repositories\CountryZoneRepository\FindableByIp;
use App\Entity\Repositories\LanguageRepository\FindableByCode;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\ServiceProvider;
use LanguageDetection\Detector\DetectByAcceptLanguage;
use LanguageDetection\Detector\DetectByConfigs;
use LanguageDetection\Detector\DetectByIpAddress;
use LanguageDetection\Detector\DetectorInterface;
use LanguageDetection\Detector\Factory;
use LanguageDetection\Store\CookieStore;
use LanguageDetection\Store\StoreInterface;

/**
 * Class LanguageDetectionServiceProvider
 */
class LanguageDetectionServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(): void
    {
        $this->app->singleton(StoreInterface::class, function (): StoreInterface {
            $langs = $this->app->make(FindableByCode::class);

            return new CookieStore($langs);
        });


        $this->app->singleton(DetectorInterface::class, function (): DetectorInterface {
            $langs = $this->app->make(FindableByCode::class);
            $zones = $this->app->make(FindableByIp::class);

            return new Factory([
                new DetectByIpAddress($zones, \env('VIRTUAL_IP_ADDR')),
                new DetectByAcceptLanguage($langs),
                new DetectByConfigs($langs, $this->app->make(Repository::class))
            ]);
        });
    }
}
