<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'alias',
        'description',
        'active',
        'created_by',
        'modified_by',
    ];

    protected $table = 'meal_types';
}
