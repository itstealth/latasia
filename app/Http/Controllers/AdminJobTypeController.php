<?php

namespace App\Http\Controllers;
use App\Models\JobType;
use Illuminate\Http\Request;

class AdminJobTypeController extends Controller
{
    public function AllJobType()
    {
        $job_type = JobType::orderBy('name','ASC')->get();
     return view('admin.job_type.all_job_type',compact('job_type'));
    }// End Method

    public function JobType()
    {
        return view('admin.job_type.job_type_add');
    }// End Method

    public function StoreJobType(Request $request)
    {
        $obj = new JobType();
        $obj->name=$request->name;
       
        $obj->save();
        return redirect()->route('all.types_job');
    }// End Method

    public function EditJobType($id)
    {
        $job_type = JobType::findOrFail($id);
        return view('admin.job_type.edit_job_type',compact('job_type'));
    }// End Methos

    public function UpdateJobType(Request $request)
    {
        $jobtype_id=$request->id;
        JobType::findOrfail($jobtype_id)->update([
    
            'name'=>$request->name,
            
           
        ]);
       
         return redirect()->route('all.types_job');
    }// End Method

    public function DeleteJobType($id)
    {
        JobType::where('id',$id)->delete();
        return redirect()->route('all.types_job');
    }// End Method
}
