<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false; // Disable Laravel's default timestamps
    protected $fillable = ['role_id','admin_type_id','country_id','name','email','password','contact_no','alternate_no','its_seo_users','its_report_manager','image','active','created','modified'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Define the belongsTo relationship
    public function roles()
    {
        return $this->belongsTo(RolesRight::class, 'role_id', 'id');
    }

    // Define the belongsTo relationship
    public function adminTypes()
    {
        return $this->belongsTo(AdminType::class,'admin_type_id', 'id');
    }


}
