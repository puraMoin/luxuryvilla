<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmEnquiryStage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','color_code','active','created_at','updated_at','created_by','modified_by'
    ];
}
