<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BookingStatuses extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'class', 
        'icon',
        'paid',
        'invoice',
        'email_template',
        'active',
        'created_at',
        'updated_at',
        // 'created_by',
        // 'modified_by',
    ];
    protected $table = 'booking_statuses';
}
