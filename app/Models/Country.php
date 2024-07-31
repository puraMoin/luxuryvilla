<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'passport_validity_in_yrs_adult', 'passport_validity_in_yrs_child', 'name', 'is_domestic_country', 'is_state_allowed', 'alpha_2_code', 'alpha_3_code',
        'calling_code', 'mobile_number_min_length', 'mobile_number_max_length', 'mobile_number_series', 'page_url', 'canonical_url', 'country_description', 'country_description_website', 'small_description', 'latitude', 'longitude',
        'is_publish_on_website', 'image_file', 'active', 'fast_facts', 'created_by','modified_by', 'created_at', 'updated_at'
    ];
}
