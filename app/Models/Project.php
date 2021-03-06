<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Project
 *
 * @property-read \App\Models\Color $color
 * @property-read \App\Models\Font $font
 * @property-read \App\Models\Icon $icon
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Layout[] $layouts
 * @property-read int|null $layouts_count
 * @property-read \App\Models\ProjectType $project_type
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Query\Builder|Project onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Query\Builder|Project withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Project withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $project_type_id
 * @property int $font_id
 * @property int $color_id
 * @property int $icon_id
 * @property string $logo_light
 * @property string $logo_dark
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereFontId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIconId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereLogoDark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereLogoLight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProjectTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @property string $subdomain
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereSubdomain($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Slider[] $sliders
 * @property-read int|null $sliders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $category_parents
 * @property-read int|null $category_parents_count
 * @property-read string $active_label
 * @property-read string $group_label
 */
class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'subdomain',
        'project_type_id',
        'font_id',
        'icon_id',
        'color_id',
        'is_active',
    ];

    protected $casts = [
        "is_active" => "boolean"
    ];

    public function is_stock_parameter_required(): bool
    {
        return (boolean) $this->project_type->stock_parameter;
    }

    /*
     * Attributes
     */
    public function getGroupLabelAttribute() : string
    {
        return "
            <div class='d-flex align-items-center'>
                <div class='symbol symbol-40 symbol-sm flex-shrink-0'>
                    <img class='' src='" . asset("images/projects/$this->subdomain/logo_dark.png") . "' alt='photo'>
                </div>
                <div class='ml-4'>
                    <div class='text-dark-75 font-weight-bolder font-size-lg mb-0'>$this->name</div>
                    <a href='$this->subdomain.a.com.tm' target='_blank' class='text-muted font-weight-bold text-hover-primary'>$this->subdomain.a.com.tm</a>
                </div>
            </div>
        ";
    }

    public function getActiveLabelAttribute() : string
    {
        $color = $this->is_active ? "success" : "danger";
        $title = $this->is_active ? "Hawa" : "??ok";
        return "
            <span class='label label-lg font-weight-bold label-$color label-inline'>$title</span>
        ";
    }

    /*
     * Relations
     */
    public function project_type(): BelongsTo
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function font() : BelongsTo
    {
        return $this->belongsTo(Font::class);
    }

    public function color() : BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function icon() : BelongsTo
    {
        return $this->belongsTo(Icon::class);
    }

    public function layouts() : BelongsToMany
    {
        return $this->belongsToMany(Layout::class);
    }

    public function sliders() : HasMany
    {
        return $this->hasMany(Slider::class);
    }

    public function categories() : HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function category_parents() : HasMany
    {
        return $this->hasMany(Category::class)->whereNull('parent_id');
    }
}
