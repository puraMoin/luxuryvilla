<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFacility extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'facility_id',
        'created_at',
        'updated_at'
    ];

    protected $table = 'properties_facilities';

    public function properties(){
        return $this->belongsTo(Property::class,'property_id');
    }

    public function facilities(){
        return $this->belongsTo(Facility::class,'facility_id');
    }

}
