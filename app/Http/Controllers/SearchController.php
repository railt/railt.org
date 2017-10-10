<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Document;
use App\Services\Language;
use Illuminate\Support\Collection;
use App\Http\Requests\SearchRequest;

/**
 * Class SearchController
 */
class SearchController
{
    /**
     * @param SearchRequest $request
     * @param Language $language
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function search(SearchRequest $request, Language $language)
    {
        $query = $request->get('query');

        $result = $this->doSearch($language, $query);

        return $result->map(function (Document $document) use ($query): array {
            return [
                'title'   => $document->title,
                'content' => \strip_tags($document->content_rendered),
                'route'   => \route('docs', ['page' => $document->uri]),
            ];
        });
    }

    /**
     * @param Language $language
     * @param string $query
     * @return Collection|Document[]
     */
    private function doSearch(Language $language, string $query)
    {
        $builder = Document::query()
            ->where('title', '<>', '')
            ->where('lang', $language->get())
            ->orderBy(\DB::raw('LENGTH(uri)'))
            ->take(5);

        $result = (clone $builder)
            ->where('title', 'LIKE', '%' . $query . '%')
            ->get();

        $additional = (clone $builder)
            ->whereNotIn('id', $result->pluck('id'))
            ->where('content_original', 'LIKE', '%' . $query . '%')
            ->get();

        return $result->merge($additional)->take(5);
    }
}
