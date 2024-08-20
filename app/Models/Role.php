<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'alias',
        'description',
        'full_view',
        'full_add',
        'full_edit',
        'full_delete',
        'super_config',
        'config',
        'created_by',
        'modified_by',
        'created_at',
        'updated_at',
    ];

    protected $table = 'roles';
}
