<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyCodeModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_code_category_id','name','active','created_by','modified_by','created_at','updated_at'
    ];

    protected $table = 'company_code_modules';

    public function companycodecategories()
    {
        return $this->belongsTo(CompanyCodeCategory::class, 'company_code_category_id');
    }

}
