<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierOnlineSupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id','online_supplier_id','created_at','updated_at'
    ];

    protected $table = 'suppliers_online_suppliers';
}
