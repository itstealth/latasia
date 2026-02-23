<?php

namespace App\Http\Controllers;
use App\Models\JobLocation; 
use Illuminate\Http\Request;

class AdminJobLocationController extends Controller
{
   public function AllJobLocation()
   {
    $location = JobLocation::orderBy('name','ASC')->get();
    return view('admin.job_Location.all_job_location',compact('location'));
   } // End Method

   public function JobLocation()
   {
    return view('admin.job_Location.add_job_location');
   }// End Method

   public function StoreJobLocation(Request $request)
   {
     $obj = new JobLocation();
      $obj->name=$request->name;
     
      $obj->save();
      return redirect()->route('all.job_location');
   }// End Metho

   public function EditJobLocation($id)
   {
       $job_location = JobLocation::findOrFail($id);
        return view('admin.job_Location.edit_job_location',compact('job_location'));
   }// End Metho

   public function UpdateJobLocation(Request $request)
   {
    $joblocation_id=$request->id;
    JobLocation::findOrfail($joblocation_id)->update([

        'name'=>$request->name,
        
       
    ]);
   
     return redirect()->route('all.job_location');
   }// End Metho

   public function DeleteJobLocation($id)
   {
        JobLocation::where('id',$id)->delete();
        return redirect()->route('all.job_location');
   }// End Method

}
