<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRepresentative extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_master_id',
        'name',
        'contact_1',
        'email_1',
        'contact_2',
        'email_2',
        'fax',
        'active',
        'created_at',
        'updated_at',
        'created_by',
        'modified_by',
    ];
    protected $table = 'company_representatives';

    public function companymaster(){
        return $this->belongsTo(CompanyMaster::class,'company_master_id');
    }

}
