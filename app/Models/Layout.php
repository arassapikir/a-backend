<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Layout
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Layout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Layout newQuery()
 * @method static \Illuminate\Database\Query\Builder|Layout onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Layout query()
 * @method static \Illuminate\Database\Query\Builder|Layout withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Layout withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $group
 * @property string $name
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Layout whereUpdatedAt($value)
 */
class Layout extends Model
{
    use SoftDeletes;

    public static array $layouts = [
        "home" => "Baş sahypa",
        "subcategory" => "Kategoriýa",
        "product-detail" => "Haryt sahypasy",
    ];

    protected $fillable = [
        'group',
        'name',
        'image'
    ];
}
