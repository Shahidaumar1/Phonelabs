<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RepairType extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['name', 'slug']; // Include 'slug' here

    // Automatically generate slug when a new record is created
    protected static function booted()
    {
        static::creating(function ($repairType) {
            if (empty($repairType->slug)) {
                $repairType->slug = Str::slug($repairType->name);
            }
        });
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function device_types()
    {
        return $this->belongsToMany(DeviceType::class);
    }

    /**
     * Get the route key for model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}