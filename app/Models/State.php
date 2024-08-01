<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['country_id', 'name','state_code','description','page_url','canonical_url','small_description','latitude','longitude','active','is_publish_on_website','created_by','modified_by','created_at','updated_at'];
    protected $table = 'states';


    // Define the belongsTo relationship
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}



