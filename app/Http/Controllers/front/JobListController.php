<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use App\Models\JobCategories;
use App\Models\JobLocation;
use App\Models\JobExperience;
use App\Models\JobGender;
use App\Models\JobSalary;
use App\Models\JobType;
use App\Models\Careers;
use Illuminate\Http\Request;


class JobListController extends Controller
{
    public function index(Request $request)

    {
         $job_category = JobCategories::orderBy('id','desc')->get();
         $job_location = JobLocation::orderBy('id','desc')->get(); 
         $job_type = JobType::orderBy('id','desc')->get();
         $job_expe = JobExperience::orderBy('id','ASC')->get();
         $job_gender = JobGender::orderBy('id','desc')->get();
         $job_salary = JobSalary::orderBy('id','desc')->get();

      $form_title = $request->title; 
      $form_location = $request->location;
      $form_category = $request->category; 
      $form_type = $request->type; 
      $form_experince = $request->experince; 
      $form_gender = $request->gender; 
      $form_salary = $request->salary;   
      
      $jobs = Jobs::with('rexperince','rjobtype','rlocation','rsalary','rgender')->orderBy('id','desc');
     
      if($request->title !=Null)
      {
        $jobs = $jobs->where('title','LIKE','%'.$request->title.'%');
      }
      if($request->location !=Null)
      {
       $jobs = $jobs->where('job_location_id',$request->location);
      }
      if($request->category !=Null)
      {
       $jobs = $jobs->where('job_category_id',$request->category);
      }
      if($request->type !=Null)
      {
       $jobs = $jobs->where('job_type_id',$request->type);
      }
      if($request->experince !=Null)
      {
       $jobs = $jobs->where('job_experince_id',$request->experince);
      }
      if($request->gender !=Null)
      {
       $jobs = $jobs->where('job_gender_id',$request->gender);
      }
      if($request->salary !=Null)
      {
       $jobs = $jobs->where('job_salary_id',$request->salary);
      }

      $jobs = $jobs->paginate(5);

     return view('frontend.job_list',compact('jobs','job_category','job_location','job_type','job_expe','job_gender','job_salary','form_title','form_location','form_category','form_type','form_experince','form_gender','form_salary'));

    }// End Method

    public function JobDetails($id)
{
    $job_single = Jobs::with('rexperince','rjobtype','rlocation','rsalary','rgender')->where('id', $id)->firstOrFail();

    // Related Jobs - get latest 4, excluding current job
    $jobs = Jobs::with('rexperince','rjobtype','rlocation','rsalary','rgender')
        ->where('job_category_id', $job_single->job_category_id)
        ->where('id', '!=', $job_single->id)
        ->latest()
        ->take(4)
        ->get();

    return view('frontend.job_detail', compact('job_single', 'jobs'));
}

    public function Careers()
    {
          return view('frontend.careers');
    }// End Method

    
}
