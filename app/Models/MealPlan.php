<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'alias',
        'active',
        'created_by',
        'created_at',
        'modified_by',
        'updated_at',
    ];

    protected $table = 'meal_plans';
}
