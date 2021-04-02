<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Visitor
 *
 * @property int $id
 * @property string|null $token
 * @property string|null $ip
 * @property int $hits
 * @property string|null $platform
 * @property string|null $version
 * @property string|null $language
 * @property \Illuminate\Support\Carbon|null $last_visited_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereHits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereLastVisitedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereVersion($value)
 * @mixin \Eloquent
 * @property string|null $subdomain
 * @method static \Illuminate\Database\Eloquent\Builder|Visitor whereSubdomain($value)
 */
class Visitor extends Model
{
    protected $fillable = [
        'token',
        'ip',
        'subdomain',
        'hits',
        'platform',
        'version',
        'language',
        'last_visited_at',
    ];

    protected $casts = [
        'last_visited_at' => 'datetime'
    ];
}
