<?php

namespace App\Models;

use App\Helpers\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $gaurded = [];
    protected $fillable = ['status', 'others', 'name', 'slug'];


    // Automatically generate slug when a new record is created
    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function getIsPublishedAttribute()
    {
        return $this->status == Status::PUBLISH ? true : false;
    }


    public function devices()
    {
        return $this->hasMany(DeviceType::class);
    }

    /**
     * Get the route key for model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }










}