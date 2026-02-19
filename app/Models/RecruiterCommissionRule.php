<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruiterCommissionRule extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
