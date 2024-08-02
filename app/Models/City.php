<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = false; // Disable Laravel's default timestamps

    protected $fillable = ['country_id', 'state_id', 'name','city_code','description','small_description','latitude','longitude','active','is_publish_on_website','fast_facts','created_at','updated_at','created_by','modified_by','country_code','country_name'];

     protected $table = 'cities';

    // Define the belongsTo relationship
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }

}
