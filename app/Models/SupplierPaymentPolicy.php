<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPaymentPolicy extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'payment_policy',
        'payment_days',
        'payment_percent',
        'description',
        'is_before_service',
        'active',
        'created_by',
        'modified_by',
        'created_at',
        'updated_at',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
