<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Picture
 *
 * @property int $id
 * @property int $product_id
 * @property int|null $parent_id
 * @property string $type
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Picture|null $original
 * @property-read Picture|null $parent
 * @property-read Picture|null $thumb
 * @method static \Illuminate\Database\Eloquent\Builder|Picture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Picture newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Picture query()
 * @method static \Illuminate\Database\Eloquent\Builder|Picture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picture whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picture whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picture whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picture whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Picture whereUrl($value)
 * @mixin \Eloquent
 */
class Picture extends Model
{
    public static array $types = [
        'cover',
        'slider',
        'original',
        "thumb"
    ];

    protected $fillable = [
        'product_id',
        'parent_id',
        'type',
        'url',
    ];

    public function parent(){
        return $this->belongsTo(Picture::class);
    }

    public function thumb(){
        return $this->hasOne(Picture::class, "parent_id")->where("type", "thumb");
    }

    public function original(){
        return $this->hasOne(Picture::class, "parent_id")->where("type", "original");
    }
}
