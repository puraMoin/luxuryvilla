<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'username', 'email','contact','active','created_at','updated_at'
    ];

    // protected $table = 'agent_lists';
}
