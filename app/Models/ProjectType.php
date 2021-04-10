<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ProjectType
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType newQuery()
 * @method static \Illuminate\Database\Query\Builder|ProjectType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType query()
 * @method static \Illuminate\Database\Query\Builder|ProjectType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ProjectType withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType whereUpdatedAt($value)
 * @property int $type
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType whereType($value)
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectType whereTitle($value)
 */
class ProjectType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "title",
        "name",
        "type"
    ];
}
