<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'value_in_percent',
        'active',
        'created_at',
        'updated_at',
        'created_by',
        'modified_by'
        
    ];

    protected $table = 'taxes';
}
