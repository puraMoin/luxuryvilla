<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModuleMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'active',
    ];
    
    protected $table = 'service_module_masters';
}
