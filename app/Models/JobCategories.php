<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategories extends Model
{
    use HasFactory;
    protected $table = 'job_categories';
    
    protected $guarded =[];

    public function rjob()
    {
        return $this->hasMany(Jobs::class,'job_category_id');
    }
}
