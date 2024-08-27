<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierCancellationPolicy extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'cancelation_policy',
        'payment_days',
        'payment_percent',
        'active',
        'created_at',
        'updated_at',
        'created_by',
        'modified_by',
        ];

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
