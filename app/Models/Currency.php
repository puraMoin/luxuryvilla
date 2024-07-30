<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'iso_code', 'iso_code_num', 'sign', 'blank', 'format', 'decimals', 'conversion_rate',
        'display_on_frontend', 'active', 'created_by', 'modified_by', 'created_at','updated_at'
    ];

}
