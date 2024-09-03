<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','user_id','agent_id','owner_id','supplier_id','destination_id','property_type_id',
        'google_address','address','country_id','state_id','city_id','latitude','longitude',
        'zipcode','area','it_supplier_property','its_apartment','apartment_lavel','check_in_time',
        'check_out_time','min_guests','max_guests','bedrooms','sleeps','bathrooms','rates_available_on_request',
        'availability_start_datetime','availability_end_datetime','description','accommodation_details','notes',
        'terms_and_conditions','cancellation_policy','facilities','bedrooms_layout','nearby','total_adult',
        'total_child','page_slug','page_title','page_url','meta_description','meta_keywords','booking_on_request',
        'deposite_value','deposite_is_percentage','deposite_is_visible','active','created_at','updated_at',
        'created_by','modified_by'
    ];

    protected $table = 'properties';

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }
    
    public function propertytypes()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function states()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function destinations()
    {
        return $this->belongsTo(Destination::class, 'destination_id', 'id');
    }
    
}
