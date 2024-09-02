<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyOwnerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id','name','email','mobile','website','address',
        'country_id','city_id','state_id','zipcode','active','google_address','created_by','modified_by',
        'created_at','updated_at'
    ];

    protected $table = 'property_owner_details';

    public function properties()
    {
        return $this->belongsTo(Property::class, 'property_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function states()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
