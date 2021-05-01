<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Category
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $children
 * @property-read int|null $children_count
 * @property-read Category $parent
 * @property-read \App\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Query\Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Query\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Category withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int $project_id
 * @property int|null $parent_id
 * @property object $title
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @property-read string $title_translation
 */
class Category extends Model
{
    use SoftDeletes;

    protected $with = ['children'];

    protected $fillable = [
        'project_id',
        'parent_id',
        'title',
        'image',
    ];

    protected $casts = [
        "title" => "object"
    ];

    public function getTitleTranslationAttribute(): string
    {
        return $this->title->{app()->getLocale()} ?? "-";
    }

    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function parent() : BelongsTo
    {
        return $this->belongsTo(Category::class, "parent_id");
    }

    public function children() : HasMany
    {
        return $this->hasMany(Category::class, "parent_id");
    }

    protected static function booted()
    {
        static::addGlobalScope(new \App\Scopes\ProjectScope);
    }
}
