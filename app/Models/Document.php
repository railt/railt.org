<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Document\ContentObserver;

/**
 * Class Document
 */
class Document extends Model
{
    private const SIDEBAR_NAME = '_sidebar';
    private const URI_DELIMITER = '/';

    /**
     * @var string
     */
    protected $table = 'documents';

    /**
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * @return void
     */
    public static function boot()
    {
        static::observe(ContentObserver::class);

        parent::boot();
    }

    /**
     * @param string $uri
     * @return void
     */
    public function setUriAttribute(string $uri): void
    {
        $this->attributes['uri'] = \trim($uri, self::URI_DELIMITER);
    }

    /**
     * @return Document|Model|null
     */
    public function nav(): ?Document
    {
        return static::query()
            ->where('lang', $this->lang)
            ->where(function (Builder $query) {
                foreach ($this->getNavUri() as $i => $uri) {
                    $query->where('uri', '=', $uri, $i ? 'or' : 'and');
                }
                return $query;
            })
            ->orderBy('uri', 'desc')
            ->first();
    }

    /**
     * @return iterable|string[]
     */
    private function getNavUri(): iterable
    {
        $parts = \explode(self::URI_DELIMITER, $this->uri);
        $parts[\count($parts) - 1] = self::SIDEBAR_NAME;

        yield $this->uri . self::URI_DELIMITER . self::SIDEBAR_NAME;
        yield \implode(self::URI_DELIMITER, $parts);
    }
}
