<?php

namespace App\Models;

use App\Helpers\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class DeviceType extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $fillable = ['name', 'status', 'category_id', 'priority', 'slug']; // Include 'slug' here

    // Automatically generate slug when a new record is created
    protected static function booted()
    {
        static::creating(function ($deviceType) {
            if (empty($deviceType->slug)) {
                $deviceType->slug = Str::slug($deviceType->name);
            }
        });
    }

    public function getIsPublishedAttribute()
    {
        return $this->status == Status::PUBLISH ? true : false;
    }

    public function modals()
    {
        return $this->hasMany(Modal::class);
    }

    public function repair_types()
    {
        return $this->belongsToMany(RepairType::class)->withPivot('order_number')->orderBy('order_number');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the route key for model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}