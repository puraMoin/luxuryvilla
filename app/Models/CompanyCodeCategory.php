<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class CompanyCodeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','active','created_by','modified_by','created_at','updated_at'
    ];

    protected $table = 'company_code_categories';

    public function companycodemodules()
    {
        return $this->hasMany(CompanyCodeModule::class);
    }
}
