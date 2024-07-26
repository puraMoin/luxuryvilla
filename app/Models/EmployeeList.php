<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeList extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'username', 'email','contact_no','active','created_at','updated_at'
    ];
}
