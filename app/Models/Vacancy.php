<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
     use HasFactory;
    protected $guarded =[];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class, 'recruiter_id'); // Recruiter assignment
    }
}
