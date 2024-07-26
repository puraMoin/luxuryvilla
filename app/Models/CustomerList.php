<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerList extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email','contact','active','created_at','updated_at'
        // add all other fields
    ];

    protected $table = 'customer_lists';
}
