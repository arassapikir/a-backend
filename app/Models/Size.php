<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Size
 *
 * @property int $id
 * @property int $layout_id
 * @property string $type
 * @property int $width
 * @property int $height
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Layout $layout
 * @method static \Illuminate\Database\Eloquent\Builder|Size newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size query()
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereLayoutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereWidth($value)
 * @mixin \Eloquent
 */
class Size extends Model
{
    public static array $types = [
        "slider",
        "category",
        "subcategory",
        "products",
        "product-slider",
        "product-zoom"
    ];

    protected $fillable = [
        'layout_id',
        'type',
        'width',
        'height',
    ];

    public function layout(){
        return $this->belongsTo(Layout::class);
    }
}
