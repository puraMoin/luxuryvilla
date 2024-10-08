<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractSeasonType extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'active',
    ];

    protected $table = 'contract_season_types';
}
