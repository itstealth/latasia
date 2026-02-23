<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
     protected $table = 'leads';
    protected $guarded =[];

    protected $casts = [
    'whatsapp_sent_at' => 'datetime',
];
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function recruiter()
    {
        return $this->belongsTo(Recruiter::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'lead_id');
    }

    public function countryRelation()
{
    return $this->belongsTo(Country::class, 'country', 'id');
}




    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
