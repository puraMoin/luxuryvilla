<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierAccessToCompany extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'company_master_id',
        'is_visible_in_company',
        'edit',
        'delete',
        'access_in_transaction',
        'created_at',
        'updated_at',
    ];

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    public function companymaster(){
        return $this->belongsTo(CompanyMaster::class,'company_master_id');
    }
}
