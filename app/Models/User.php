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
    protected $fillable = ['role_id','company_master_id','username','password','user_code','first_name','last_name','name','gender','email','dob','contact_no','mobile_no','google_address','country_id','state_id','city_id','area','zipcode','address','image_file','active','created_at','updated_at'];

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
    public function companymaster()
    {
        return $this->belongsTo(CompanyMaster::class, 'company_master_id', 'id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
    public function states()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }    
}
