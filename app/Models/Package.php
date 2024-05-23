<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'url',
        'price',
        'currency',
        'duration',
        'duration_unit',
        'trial',
        'trial_unit',
        'discount',
        'discount_unit',
        'type',
        'category',
        'status',
    ];


    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }


    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }


    public function scopeSuspended($query)
    {
        return $query->where('status', 'suspended');
    }

    public function accounts()
    {
        return $this->hasMany(UserPackage::class);
    }
}
