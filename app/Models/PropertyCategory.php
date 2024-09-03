<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'active',
        'created_at',
        'updated_at',
        'created_by',
        'modified_by'
    ];
    protected $table = 'property_categories';

    
}
