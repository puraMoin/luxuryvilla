<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyMaster extends Model
{
    use HasFactory;

    protected $fillable = ['name','alias','registration_no','vat_no','business_registration_name','tin_no','currency_id','incorporate_name','website','address','country_id','state_id','city_id','zipcode','area','phone_calling_code_1','contact_no_1','phone_calling_code_2','contact_no_2','email','fax','image_file','note','active','facebook_link','twitter_link','header_image_file','footer_image_file','google_address','created_at','updated_at','created_by','modified_by'];

    protected $table = 'company_masters';

    
    // Define the belongsTo relationship
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
