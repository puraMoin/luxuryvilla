<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxAccessToCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'tax_master_id',
        'company_master_id',
        'is_visible_in_company',
        'edit',
        'delete',
        'access_in_transaction',
        'created_at',
        'updated_at',
        'created_by',
        'modified_by',
    ];

    public function companymaster(){
        return $this->belongsTo(CompanyMaster::class,'company_masters_id');
    }

    public function taxmaster(){
        return $this->belongsTo(TaxMaster::class,'tax_masters_id');
    }
}