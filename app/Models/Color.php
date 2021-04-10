<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Color
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color newQuery()
 * @method static \Illuminate\Database\Query\Builder|Color onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Color query()
 * @method static \Illuminate\Database\Query\Builder|Color withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Color withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $color_1
 * @property string $color_2
 * @property string|null $color_3
 * @property string|null $color_4
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereColor1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereColor2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereColor3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereColor4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereUpdatedAt($value)
 */
class Color extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'name',
        'color_1',
        'color_2',
        'color_3',
        'color_4',
        'image',
    ];
}
