<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Hit
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Hit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hit query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $date
 * @property int $hour
 * @property string $ip
 * @property string|null $platform
 * @property string|null $subdomain
 * @property int $hits
 * @method static \Illuminate\Database\Eloquent\Builder|Hit whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hit whereHits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hit whereHour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hit whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hit wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hit whereSubdomain($value)
 */
class Hit extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'date',
        'hour',
        'ip',
        'platform',
        'subdomain',
        'hits'
    ];
}
