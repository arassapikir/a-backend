<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property int $phone
 * @property string|null $phone_verified_at
 * @property int|null $otp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $project_id
 * @property string $type
 * @property string|null $password
 * @property string $status
 * @property string|null $gender
 * @property \Illuminate\Support\Carbon|null $birthday
 * @property string $platform
 * @property string|null $version
 * @property string $language
 * @property \Illuminate\Support\Carbon $last_visited_at
 * @property string|null $fcm_token
 * @property-read \App\Models\Project|null $project
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFcmToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastVisitedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVersion($value)
 * @property string|null $email
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @property string|null $ip
 * @property int $hits
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIp($value)
 * @property string|null $token
 * @method static \Illuminate\Database\Eloquent\Builder|User whereToken($value)
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public static array $statuses = [
        "unverified" => [
            "title" => [
                "tk" => "Tassyklanmadyk",
                "ru" => "Непроверенный",
            ],
            "color" => "warning"
        ],
        "active" => [
            "title" => [
                "tk" => "Aktiw",
                "ru" => "Актив",
            ],
            "color" => "success"
        ],
        "blocked" => [
            "title" => [
                "tk" => "Bloklanan",
                "ru" => "Заблокирован",
            ],
            "color" => "danger"
        ],
        "suspended" => [
            "title" => [
                "tk" => "Bloklanan - admin",
                "ru" => "Заблокирован - админ",
            ],
            "color" => "danger"
        ],
    ];

    public static array $types = [
        "admin",
        "customer",
        "user",
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'type',
        'name',
        'phone',
        'phone_verified_at',
        'email',
        'password',
        'otp',
        'status',
        'gender',
        'birthday',
        'platform',
        'version',
        'ip',
        'hits',
        'language',
        'last_visited_at',
        'fcm_token',
        'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'otp',
        'fcm_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'phone_verified_at' => 'datetime',
        'last_visited_at' => 'datetime',
        'birthday' => 'date',
    ];

    /**
     * @return bool
     */
    public function is_user_blocked() : bool
    {
        return in_array($this->status, config('app.blocked_statuses'));
    }

    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function is_admin() : bool
    {
        return $this->project_id == 1 && $this->type == "admin";
    }

    public function is_customer() : bool
    {
        return $this->project_id != 1 && $this->type == "customer";
    }

    public function is_user() : bool
    {
        return $this->project_id != 1 && $this->type == "user";
    }
}
