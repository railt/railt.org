<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Entity\Language;
use Search\SearchInterface;

/**
 * Class SearchController
 */
class SearchController extends Controller
{
    /**
     * @var Language
     */
    private $language;

    /**
     * @var SearchInterface
     */
    private $search;

    /**
     * SearchController constructor.
     * @param Language $language
     * @param SearchInterface $search
     */
    public function __construct(Language $language, SearchInterface $search)
    {
        $this->language = $language;
        $this->search = $search;
    }

    /**
     * @param string $query
     * @return iterable
     */
    public function query(string $query): iterable
    {
        return \collect($this->search->search($this->language, $query, 5))->toArray();
    }
}
