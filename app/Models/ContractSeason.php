<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractSeason extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'contract_id',
        'villa_master_id',
        'contract_season_type_id',
        'start_date',
        'end_date',
        'tax_value',
        'is_overall_text',
        'service_charge',
        'min_night_stay',
        'default_b2b_markup',
        'default_b2b_markup_is_percentage',
        'default_b2c_markup',
        'default_b2c_markup_is_percentage',
        'commission_value',
        'comission_is_percentage',
        'cost_type_id',
        'cost',
        'allotment',
        'release_days',
        'active',
        'created_at',
        'updated_at',
        'deposit_amount',
        'deposit_amount_is_percentage',
        'final_date_of_payment',
        'amount_days',
    ];

    protected $table = 'contract_seasons';

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function costtype()
    {
        return $this->belongsTo(CostType::class, 'cost_type_id');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    public function contractseasontype()
    {
        return $this->belongsTo(ContractSeasonType::class, 'contract_season_type_id');
    }
}
