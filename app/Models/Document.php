<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Models;

use App\Models\Document\ContentObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Document
 */
class Document extends Model
{
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
}
