<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alias',
        'description',
        'is_vat',
        'active',
        'is_municipality_tax',
        'created_at',
        'updated_at',
        'created_by',
        'modified_by',
    ];

    protected $table = 'tax_masters';
}
