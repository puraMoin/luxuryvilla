<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentCreditType extends Model
{
    use HasFactory;
  
    protected $fillable = ['name', 'active','created_by','modified_by','created_at','updated_at'];

    protected $table = 'agent_credit_types';

}
