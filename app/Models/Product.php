<?php

namespace App\Models;

use Carbon\Carbon;
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
 * @property int $project_id
 * @property-read \App\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProjectId($value)
 * @property-read mixed $discounted
 * @property-read mixed $discounted_percentage
 * @property-read mixed $new
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Picture[] $pictures
 * @property-read int|null $pictures_count
 * @property-read mixed $cover_url
 * @property int|null $brand_id
 * @property-read \App\Models\Brand|null $brand
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBrandId($value)
 * @property-read mixed $brand_label
 * @property int $stock
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStock($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Parameter[] $values
 * @property-read int|null $values_count
 * @property int $stock_type
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStockType($value)
 */
class Product extends Model
{
    use SoftDeletes;

    /*
     * Stock types: 1 => default, 2 => size
     *
     */

    protected $fillable = [
        'project_id',
        'category_id',
        'brand_id',
        'code',
        'slug',
        'title',
        'description',
        'price',
        'discounted_price',
        'order',
        'stock_type',
        'stock',
        'active',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'active' => "boolean",
        'price' => "decimal:2",
        'discounted_price' => "decimal:2",
        'title' => "object",
        'description' => "object",
    ];

    public function getNewAttribute(){
        return Carbon::now()->diff(new Carbon($this->created_at))->days > 7;
    }

    public function getBrandLabelAttribute(){
        return $this->brand ? $this->brand->name : null;
    }

    public function getDiscountedAttribute(){
        return ! ! $this->discounted_price;
    }

    public function getDiscountedPercentageAttribute(){
        return $this->discounted_price ? round(100 - ($this->discounted_price * 100 / $this->price)) : null;
    }

    public function getCoverUrlAttribute(){
        return $this->cover ? asset($this->cover->url) : null;
    }

    public function getStockAttribute(){
        if ($this->stock_type == 1){
            return $this->stock;
        }
        return $this->parameters->where('type', Parameter::size())->first()->pivot->stock;
    }

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
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function values(){
        return $this->belongsToMany(Parameter::class, "product_parameters", "product_id", "value_id")->withPivot(['parent_id', 'stock']);
    }

    public function parameters(){
        return $this->belongsToMany(Parameter::class, "product_parameters", "product_id", "parent_id")->withPivot(['value_id', 'stock']);
    }

    public function pictures(){
        return $this->hasMany(Picture::class);
    }

    public function cover(){
        return $this->hasOne(Picture::class)->where('type', 'cover');
    }

    public function sliders(){
        return $this->hasMany(Picture::class)->where('type', 'slider');
    }
}
