<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialYear extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'is_current_year',
        'start_date',
        'end_date',
        'active', 
        'description', 
        'created_by',
        'created_at',
        'modified_by',
        'updated_at',
    ];

    protected $table = 'financial_years';
}
