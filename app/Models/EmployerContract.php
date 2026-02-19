<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class EmployerContract extends Model
{
     use HasFactory;
    protected $guarded =[];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
