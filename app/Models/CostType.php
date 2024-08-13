<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostType extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'active',
        'created_at',
        'updated_at',
    ];
    protected $table = 'cost_types';
}
