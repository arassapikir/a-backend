<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Font
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Font newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Font newQuery()
 * @method static \Illuminate\Database\Query\Builder|Font onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Font query()
 * @method static \Illuminate\Database\Query\Builder|Font withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Font withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Font whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Font whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Font whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Font whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Font whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Font whereUpdatedAt($value)
 */
class Font extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "name",
        "image"
    ];
}
