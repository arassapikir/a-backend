<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Icon
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Icon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Icon newQuery()
 * @method static \Illuminate\Database\Query\Builder|Icon onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Icon query()
 * @method static \Illuminate\Database\Query\Builder|Icon withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Icon withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Icon whereUpdatedAt($value)
 */
class Icon extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "name",
        "image"
    ];
}
