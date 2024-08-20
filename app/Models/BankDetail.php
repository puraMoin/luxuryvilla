<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    use HasFactory;

    protected $fillable = ['company_master_id','name','alias','sort_code','address','account_no','currency_id',
                            'swift_code','iban_no','ifsc_code','bank_contact','connecting_bank_name','connecting_bank_ifsc_code',
                            'google_address','country_id','city_id','state_id','active','created_at','updated_at','created_by','modified_by'
                            ];

    protected $table = 'bank_details';

        // Define the belongsTo relationship
        public function companymaster()
        {
            return $this->belongsTo(CompanyMaster::class , 'company_master_id');
        }
        public function currency()
        {
            return $this->belongsTo(Currency::class , 'currency_id');
        }
        public function country()
        {
            return $this->belongsTo(Country::class ,'country_id');
        }
        public function state()
        {
            return $this->belongsTo(State::class ,'state_id');
        }
        public function city()
        {
            return $this->belongsTo(City::class ,'city_id');
        }
}
