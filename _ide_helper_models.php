<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Class Document
 *
 * @property int $id
 * @property string $title
 * @property string $lang
 * @property string $uri
 * @property string $hash
 * @property string $content_original
 * @property string $content_rendered
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereContentOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereContentRendered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereUri($value)
 */
	class Document extends \Eloquent {}
}

