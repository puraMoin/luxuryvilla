<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IslandMasters extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'alias', 
        'description', 
        'created_at', 
        'updated_at',
        'created_by',
        'modified_by'
    ];
}
