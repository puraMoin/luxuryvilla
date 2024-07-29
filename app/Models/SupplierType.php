<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','active','created_at','updated_at'
    ];

    protected $table = 'supplier_types';
}
