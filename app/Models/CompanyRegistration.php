<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRegistration extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_master_id',
        'company_text_information_id',
        'registration_body',
        'registration_number',
        'registration_expiry_date',
        'active',
        'created_by',
        'modified_by',
        'created_at',
        'updated_at',
    ];

    protected $table = 'company_registrations';

    public function companytextinformation(){
        return $this->belongsTo(CompanyTextInformation::class,'company_text_informations_id');
    }

    public function companymaster(){
        return $this->belongsTo(CompanyMaster::class,'company_master_id');
    }

}
