<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Parameter
 *
 * @property int $id
 * @property int|null $parent_id
 * @property object $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Parameter[] $children
 * @property-read int|null $children_count
 * @property-read Parameter|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter newQuery()
 * @method static \Illuminate\Database\Query\Builder|Parameter onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Parameter withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Parameter withoutTrashed()
 * @mixin \Eloquent
 * @property string $type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Parameter whereType($value)
 */
class Parameter extends Model
{
    use SoftDeletes;

    public static array $types = [
        'others',
        'size',
        'color',
    ];

    public static function size() : int {
        return array_search('size', self::$types);
    }

    protected $fillable = [
        'parent_id',
        'title',
        'type'
    ];

    protected $casts = [
        'title' => 'object'
    ];

    /**
     * Scopes
     */
    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Relations
     */
    public function parent(){
        return $this->belongsTo(Parameter::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(Parameter::class, 'parent_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class, "product_parameters", "value_id", "product_id")->withPivot('stock');
    }
}
