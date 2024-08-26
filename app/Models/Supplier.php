<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_code','supplier_type_id','username','password','name','username','password',
        'supplier_region_type_id','doing_business_under_name_of','gst_no','company_address',
        'country_id','city_id','state_id','zipcode','area','is_online_supplier','contact_no_1',
        'contact_no_2','fax','email','payee_name','description','vat_ref_number','is_default_supplier',
        'image_file','google_address','supplier_unique_number','active','created_by','modified_by',
        'created_at','updated_at','is_locked','is_current_active_for_chat','is_supplier','is_code_setup_used',
        'dob'
    ];

    protected $table = 'suppliers';

    public function suppliertype()
    {
        return $this->belongsTo(SupplierType::class, 'supplier_type_id', 'id');
    }
    public function supplierregiontype()
    {
        return $this->belongsTo(SupplierType::class, 'supplier_region_type_id', 'id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function states()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }   
}
