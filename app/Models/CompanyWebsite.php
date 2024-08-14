<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyWebsite extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_master_id',
        'website_type_id',
        'country_id',
        'name',
        'link',
        'active',
        'created_by',
        'modified_by',
    ];

    protected $table = 'company_websites';

    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }

    public function companymaster(){
        return $this->belongsTo(CompanyMaster::class,'company_master_id');
    }

    public function websitetype(){
        return $this->belongsTo(WebsiteType::class,'website_type_id');
    }

}
