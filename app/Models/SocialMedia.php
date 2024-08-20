<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $fillable = ['company_website_id', 'name', 'link', 'image', 'order', 'active', 'created_at', 'updated_at'];

    protected $table = 'social_medias';

    public function companywebsite(){
        return $this->belongsTo(CompanyWebsite::class,'company_website_id');
    }
}
