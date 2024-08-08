<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['country_id','state_id','city_id','name','one_line_description','thumbnail_image','cover_image','display_on_homepage','no_of_elements_to_show','homepage_order','description','active','slug','is_top_destination','created_at','updated_at'];

    protected $table = 'destinations';

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
