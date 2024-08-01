<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Segment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = ['name','code','active','created_by','modified_by','created_at','updated_at'];

     protected $table = 'segments';

    // Define the hasMany relationship
    public function countries()
    {
        return $this->hasMany(Country::class, 'segment_id', 'id');
    }
}
