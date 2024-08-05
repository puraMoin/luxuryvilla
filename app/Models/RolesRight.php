<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesRight extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'assigned_dashboard_id',
        'description',
        'active',
        'created_at',
        'updated_at',
        'created_by',
        'modified_by',
    ];

    protected $table = 'role_and_rights';

    public function assignedDashboard(){
        return $this->belongsTo(AssignedDashboard::class);
    }
   
}
