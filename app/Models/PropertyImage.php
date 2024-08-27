<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image_file',
        'is_cover_image',
        'display_order',
        'active',
        'created_at',
        'updated_at',
        'created_by',
        'modified_by',
    ];
}
