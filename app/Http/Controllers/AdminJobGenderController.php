<?php

namespace App\Http\Controllers;
use App\Models\JobGender;
use Illuminate\Http\Request;

class AdminJobGenderController extends Controller
{
    public function AllJobGender()
    {
        $job_gender=JobGender:: Orderby('name','ASC')->get();
        return view('admin.job_gender.all_job_gender',compact('job_gender'));
    }// End Method
    public function JobGenderAdd()
    {
     return view('admin.job_gender.add_job_gender');
    }// End Method
    public function StoreJobGender(Request $request)
    {
      $obj = new JobGender();
     $obj->name=$request->name;
     $obj->save();
     return redirect()->route('all.job_gender');

    }// End Method
    public function EditJobGender($id)
    {
      $editjob_gender = JobGender::findOrFail($id);
      return view('admin.job_gender.edit_job_gender',compact('editjob_gender'));
    }// End Method
    public function UpdateJobGender(Request $request)
    {
     $job_gender_id= $request->id;
     JobGender::findOrFail($job_gender_id)->update([
      'name'=>$request->name,
         
     ]);
     return redirect()->route('all.job_gender');
    }// End Method

    public function DeleteJobGender($id)
    {
        JobGender:: where('id',$id)->delete(); 
        return redirect()->route('all.job_gender');
    }
}
