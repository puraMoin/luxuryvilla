<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmEnquiryStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'crm_enquiry_stage_id',
        'name',
        'color_code',
        'active',
        'created_at',
        'updated_at',
        'created_by',
        'modified_by'
    ];

    protected $table = 'crm_enquiry_statuses';

    public function crmEnquiryStage()
    {
        return $this->belongsTo(CrmEnquiryStage::class, 'crm_enquiry_stage_id');
    }
}
