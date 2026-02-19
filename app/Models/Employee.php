<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    public $timestamps = true;

    protected $fillable = [
        'lead_id',
        'recruiter_id',
        'employee_code',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'gender',
        'passport_number',
        'passport_type',
        'passport_expiry',
        'nationality',
        'current_location',
        'experience_years',
        'education',
        'primary_skill',
        'skills',
        'current_designation',
        'documents_complete',
        'test_required',
        'test_cleared',
        'medical_cleared',
        'deployment_ready',
        'status',
         'deployment_status',
        'converted_at',
    ];

    /* =========================
     | Relationships
     ========================= */

    // Employee belongs to Lead
    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    // Compliance (uses lead_id)
    public function compliance()
    {
        return $this->hasOne(EmployeeCompliance::class);
    }

    // Deployment (uses lead_id)
    public function deployment()
    {
        return $this->hasOne(EmployeeDeployment::class);
    }

    // Timesheets (uses lead_id)
    public function timesheets()
    {
        return $this->hasMany(EmployeeTimesheet::class);
    }

    // Invoices (IMPORTANT FIX)
    // ❌ employee_id does NOT exist in invoices table
    // ✅ invoices are linked via lead_id
    public function invoices()
    {
        return $this->hasMany(Invoice::class,'employer_id','id');
    }

    // Recruiter commissions (uses lead_id)
    public function commissions()
    {
        return $this->hasMany(RecruiterCommission::class);
    }
}
