<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlatform extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'platform_id',
        'platform_user_id',
        'platform_user_username',
        'platform_user_email',
        'platform_user_status',
        'platform_user_phone_number',
        'platform_user_last_login',
        'platform_user_role',
        'platform_user_token',
        'platform_user_secret',
        'platform_user_refresh_token',
        'platform_user_expires_in',
        'platform_user_token_type',
        'platform_user_scope',
        'platform_user_avatar',
        'platform_user_profile_url',
        'status'
    ];

    /**
     * Get the user that owns the user platform.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the platform that owns the user platform.
     */

    public function platform(){
        return $this->belongsTo(Platform::class);
    }
}
