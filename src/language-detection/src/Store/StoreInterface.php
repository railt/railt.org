<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace LanguageDetection\Store;

use App\Entity\Language;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface StoreInterface
 */
interface StoreInterface
{
    /**
     * @param Request $request
     * @return Language|null
     */
    public function read(Request $request): ?Language;

    /**
     * @param Response $response
     * @param Language $language
     * @return Response
     */
    public function write(Response $response, Language $language): Response;
}
