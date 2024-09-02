<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertySeoTag extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'name',
        'description',
        'keywords',
        'active',
        'created_by',
        'modified_by',
        'created_at',
        'updated_at',
    ];

    protected $table = 'property_seo_tags';

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }
}
