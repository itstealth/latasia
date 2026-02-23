<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTimesheet extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function deployment()
    {
        return $this->belongsTo(EmployeeDeployment::class);
    }
}
