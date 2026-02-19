<?php

namespace App\Http\Controllers;
use App\Models\JobSalary;
use Illuminate\Http\Request;

class AdminJobSalaryController extends Controller
{
    public function AllJobSalary()

    {
     $job_salary = JobSalary::OrderBy('name','ASC')->get();
     return view('admin.job_salary.all_job_salary',compact('job_salary'));
    }// End Method
    public function JobSalaryAdd()
    {
     return view('admin.job_salary.add_job_salary');
    }// End Method
    public function StoreJobSalary(Request $request)
    {
      $obj = new JobSalary();

      $obj->name=$request->name;
      $obj->save();
      return redirect()->route('all.job_salary');
     
    }// End Method
    public function EditJobSalary($id)
    {
      $edit_job_salary= JobSalary::FindOrFail($id);
      return View('admin.job_salary.edit_job_salary',compact('edit_job_salary'));
    }// End Method
    public function UpdateJobSalary(Request $request)
    {
        $job_salary_id=$request->id;
        JobSalary::FindOrFail($job_salary_id)->update([
         'name'=>$request->name,
        ]);
        return redirect()->route('all.job_salary');
    }// End Method
    public function DeleteJobSalary ($id)
    {
        JobSalary::where('id',$id)->delete();
        return redirect()->route('all.job_salary');
    }// End Method
}
