<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'photo',
        'url',
        'domain',
        'homepage',
        'smtp',
        'support_email',
        'description',
        'auto_login',
        'auto_register',
        'admin_email',
        'admin_url',
        'metadata',
        'settings',
        'api_keys',
        'api_url',
        'webhook_url',
        'callback_url',
        'redirect_url',
        'environment',
        'type',
        'category',
        'country',
        'status',
    ];

    /**
     * Scope a query to only include active platforms.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include inactive platforms.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    /**
     * Scope a query to only include suspended platforms.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeSuspended($query)
    {
        return $query->where('status', 'suspended');
    }

    /**
     * Scope a query to only include platforms where login is enabled.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeLoginEnabled($query)
    {
        return $query->where('auto_login', 'enabled');
    }

    /**
     * Scope a query to only include platforms where register is enabled.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeAutoRegistertionEnabled($query)
    {
        return $query->where('auto_register', 'enabled');
    }

    /**
     * Scope a query to only include platforms where login is disabled.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeLoginDisabled($query)
    {
        return $query->where('auto_login', 'disabled');
    }

    /**
     * Scope a query to only include platforms where register is disabled.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeAutoRegistertionDisabled($query)
    {
        return $query->where('auto_register', 'disabled');
    }

    // platform has many user accounts
    public function accounts()
    {
        return $this->hasMany(UserPlatform::class);
    }

}
