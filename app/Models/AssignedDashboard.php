<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedDashboard extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'active',
        'created_by',
        'modified_by',
    ];
}
