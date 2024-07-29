<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','username','email','contact','active','created_at','updated_at'
        // add all other fields
    ];

    protected $table = 'admin_lists';
}
