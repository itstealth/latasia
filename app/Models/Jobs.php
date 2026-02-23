<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Jobs extends Model
{
    use HasFactory;
    protected $table = 'ljobs';
    protected $fillable = [
        'project_id','title','socal_media_name','description','responsibility','skill','benefit','deadline','vacancy','job_category_id','job_location_id','job_type_id','job_experince_id','job_gender_id','job_salary_id','map_code','is_featured',
        'is_urgent','country','job_image','social_image','salary_duration','project_name','education',
    ];
    public function rjobtype()
    {
        return $this->belongsTo(JobType::class,'job_type_id');
    }
    public function rexperince()
    {
        return $this->belongsTo(JobExperience::class,'job_experince_id');
    }
    public function rcategory()
    {
        return $this->belongsTo(JobCategories::class,'job_category_id');
    }
    public function rgender()
    {
        return $this->belongsTo(JobGender::class,'job_gender_id');

    }
    public function rlocation()
    {
        return $this->belongsTo(JobLocation::class,'job_location_id');
    }
    public function rsalary()
    {
        return $this->belongsTo(JobSalary::class,'job_salary_id');
    }
    public function signups()
    {
        return $this->hasMany(SignUp::class, 'job_id');
    }
    
    public function isBookmarked()
    {
        $user = Auth::guard('candidate')->user();
        if ($user) {
            return $user->bookmarks()->where('job_id', $this->id)->exists();
        }
        return false;
    }

    public function appliedJobs()
    {
        return $this->hasMany(AppliedJobs::class, 'job_id');
    }
    
}
