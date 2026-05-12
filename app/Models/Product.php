<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Repair;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'master_id',
        'category_id',
        'repair_name',
        'price',
        'slug',
    ];

    // Automatically generate slug when a new record is created
    protected static function booted()
    {
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->repair_name);
            }
        });
    }

    public function master()
    {
        return $this->belongsTo(MasterCategory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    /**
     * Get the route key for model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
