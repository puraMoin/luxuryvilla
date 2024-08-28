<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'name',
        'designation',
        'email',
        'mobile',
        'active',
        'created_at',
        'updated_at',
        'created_by',
        'modified_by',
        ];

    protected $table = 'supplier_contacts';

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
