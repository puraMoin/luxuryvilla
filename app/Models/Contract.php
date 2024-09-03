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
        'property_id',
        'currency_id',
        'cost_type_id',
        'start_date',
        'end_date',
        'terms_and_conditions',
        'service_charge_value',
        'service_charge_percentage',
        'active',
        'its_villa',
        'its_apartment',
    ];

    protected $table = 'contracts';

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function costtype()
    {
        return $this->belongsTo(CostType::class, 'cost_type_id');
    }

    public function tax()
    {
        return $this->belongsTo(Taxes::class, 'tax_id');
    }
}
