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
 * Class Factory
 */
class Factory implements DetectorInterface
{
    /**
     * @var array|DetectorInterface[]
     */
    private $detectors = [];

    /**
     * Factory constructor.
     * @param iterable|DetectorInterface[] $detectors
     */
    public function __construct(array $detectors = [])
    {
        $this->add(...$detectors);
    }

    /**
     * @param DetectorInterface ...$detectors
     * @return Factory|$this
     */
    public function add(DetectorInterface ...$detectors): self
    {
        foreach ($detectors as $detector) {
            $this->detectors[] = $detector;
        }

        return $this;
    }

    /**
     * @param Request $request
     * @return Language|null
     */
    public function detect(Request $request): ?Language
    {
        foreach ($this->detectors as $detector) {
            $language = $detector->detect($request);

            if ($language) {
                return $language;
            }
        }

        return null;
    }
}
