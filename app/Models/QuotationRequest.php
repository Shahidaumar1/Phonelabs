<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuotationRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'repair_type_id',
        'device',
        'modal',
        'repair',
        'name',
        'email',
        'phone',
        'message',
        'status',
    ];

    protected $dates = ['deleted_at'];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
    
    protected static function boot()
{
    parent::boot();

    static::created(function ($quotation) {
        \App\Models\QuotationNotification::create([
            'quotation_id'  => $quotation->id,
            'customer_name' => $quotation->name,
            'device'        => $quotation->device,
            'repair'        => $quotation->repair,
            'is_read'       => false,
        ]);
    });
}

     public function repairType()
    {
        return $this->belongsTo(RepairType::class);
    }
     public function messages()
    {
        return $this->hasMany(QuotationMessage::class, 'quotation_id')->orderBy('created_at', 'asc');
    }


}


   