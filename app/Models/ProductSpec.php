<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProductSpec extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Original relationship (keep this)
    public function model()
    {
        return $this->belongsTo(Modal::class);
    }

    // New alias to avoid Laravel's built-in 'model' conflict
    public function modalModel()
    {
        return $this->belongsTo(Modal::class, 'model_id');
    }
}