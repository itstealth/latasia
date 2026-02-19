<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDeployment extends Model
{
    use HasFactory;
   protected $fillable = [
        'employee_id',
        'employer_id',
        'project_id',
        'vacancy_id',
        'deployment_status',
        'departure_date',
        'joining_date',
        'return_date',
        'country',
        'city',
        'site_location',
        'remarks',
        'created_by',
        'updated_by',
    ];
    
}
