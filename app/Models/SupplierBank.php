<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierBank extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'name',
        'branch',
        'location',
        'address',
        'contact_no_1',
        'contact_no_2',
        'fax',
        'email',
        'account_no',
        'account_type',
        'swift_code',
        'currency_id',
        'ifsc_code',
        'iban_no',
        'active',
        'created_at',
        'updated_at',
        'created_by',
        'modified_by',

    ];

    protected $table = 'supplier_banks';

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }

    public function currency(){
        return $this->belongsTo(Currency::class,'currency_id');
    }
}
