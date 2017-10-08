<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Middleware;

use Carbon\Carbon;
use App\Services\Language;
use Symfony\Component\Translation\Exception\InvalidArgumentException;

/**
 * Class BootLocale
 */
class BootLocale
{
    /**
     * @var Language
     */
    private $language;

    /**
     * BootLocale constructor.
     * @param Language $language
     */
    public function __construct(Language $language)
    {
        $this->language = $language;
    }

    /**
     * @param $request
     * @param \Closure $next
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function handle($request, \Closure $next)
    {
        Carbon::setLocale($this->language->get());
        \Lang::setLocale($this->language->get());

        return $next($request);
    }
}
