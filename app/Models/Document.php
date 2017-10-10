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
        $parts = \explode(self::URI_DELIMITER, $this->uri);
        $parts[\count($parts) - 1] = self::SIDEBAR_NAME;

        return static::query()
            ->where('lang', $this->lang)
            ->where('uri', '=', \implode(self::URI_DELIMITER, $parts))
            ->orderBy('uri', 'desc')
            ->first();
    }

    /**
     * @return Document|Model|null
     */
    public function childNav(): ?Document
    {
        return static::query()
            ->where('lang', $this->lang)
            ->where('uri', '=', $this->uri . self::URI_DELIMITER . self::SIDEBAR_NAME)
            ->orderBy('uri', 'desc')
            ->first();
    }

    /**
     * @return Document|Model|null
     */
    public function parentNav(): ?Document
    {
        $parts = \explode(self::URI_DELIMITER, $this->uri);

        if (\count($parts) < 2) {
            return null;
        }

        \array_pop($parts);
        $parts[\count($parts) - 1] = self::SIDEBAR_NAME;

        return static::query()
            ->where('lang', $this->lang)
            ->where('uri', '=', \implode(self::URI_DELIMITER, $parts))
            ->orderBy('uri', 'desc')
            ->first();
    }
}
