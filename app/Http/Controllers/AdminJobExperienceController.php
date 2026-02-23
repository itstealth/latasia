<?php

namespace App\Http\Controllers;
use App\Models\JobExperience;
use Illuminate\Http\Request;

class AdminJobExperienceController extends Controller
{
  public function AllJobExperience()
  {
    $job_exp = JobExperience::orderBy('name','ASC')->get();
     return view('admin.job_exp.all_job_exp',compact('job_exp'));
  } // End Method 

  public function JobExperienceAdd()
  {
    return view('admin.job_exp.job_exp_add');
  }//End Method
  public function StoreJobExperience(Request $request)
  {
    $obj = new JobExperience();
    $obj->name=$request->name;
   
    $obj->save();
    return redirect()->route('all.job_experience');
  }// End Method

  public function EditJobExperience($id)
  {
    $edit_job_exp = JobExperience::findOrFail($id);
    return view('admin.job_exp.edit_job_exp',compact('edit_job_exp'));
  }// End Method

  public function UpdateJobExperience(Request $request)
  {
    $jobexp_id=$request->id;
    JobExperience::findOrfail($jobexp_id)->update([

        'name'=>$request->name,
        
       
    ]);
   
    return redirect()->route('all.job_experience');
  }// End Method

  public function DeleteJobExperience($id)
  {
    JobExperience::where('id',$id)->delete();
    return redirect()->route('all.job_experience');
  }// End Method
}
