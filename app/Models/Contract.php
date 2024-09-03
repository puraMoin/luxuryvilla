<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'supplier_id',
        'villa_master_id',
        'currency_id',
        'cost_type_id',
        'tax_id',
        'start_date',
        'end_date',
        'terms_and_conditions',
        'service_charge_value',
        'active',
        'its_villa',
        'its_apartment',
        'created_at',
        'updated_at',

    ];
}
