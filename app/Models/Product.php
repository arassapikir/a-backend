<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property int $category_id
 * @property string|null $code
 * @property string|null $slug
 * @property object $title
 * @property object|null $description
 * @property mixed $price
 * @property mixed|null $discounted_price
 * @property int|null $order
 * @property bool|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Picture|null $cover
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Parameter[] $parameters
 * @property-read int|null $parameters_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Picture[] $sliders
 * @property-read int|null $sliders_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product active()
 * @method static \Illuminate\Database\Eloquent\Builder|Product discounted()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDiscountedPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin \Eloquent
 */
class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'code',
        'slug',
        'title',
        'description',
        'price',
        'discounted_price',
        'order',
        'active',
    ];

    protected $casts = [
        'active' => "boolean",
        'price' => "decimal:2",
        'discounted_price' => "decimal:2",
        'title' => "object",
        'description' => "object",
    ];


    /**
     * Scopes
     */
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeDiscounted($query)
    {
        return $query->where('discounted_price', '>', 0);
    }


    /**
     * Relations
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function parameters(){
        return $this->hasMany(Parameter::class);
    }

    public function cover(){
        return $this->hasOne(Picture::class)->where('type', 'cover');
    }

    public function sliders(){
        return $this->hasMany(Picture::class)->where('type', 'slider');
    }
}
