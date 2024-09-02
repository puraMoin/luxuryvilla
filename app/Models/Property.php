<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';


    public function suppliertype()
    {
        return $this->belongsTo(SupplierType::class, 'supplier_type_id', 'id');
    }


}
