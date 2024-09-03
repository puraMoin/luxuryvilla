<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyVillaCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'property_category_id',
        'created_at',
        'updated_at'
    ];

    protected $table = 'properties_villa_categories';

    public function properties(){
        return $this->belongsTo(Property::class,'property_id');
    }

    public function propertycategory(){
        return $this->belongsTo(Facility::class,'property_category_id');
    }

}
