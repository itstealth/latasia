<?php

namespace App\Http\Controllers;
use App\Models\JobCategories; 
use Illuminate\Http\Request;

class AdminJobController extends Controller
{
    public function AllJob()
    {  
        $categorys = JobCategories::orderBy('name','ASC')->get();
        return view('admin.jobcategories.all_job',compact('categorys'));
    }// End Method

    public function AddJob()
    {
        return view('admin.jobcategories.job_add');
    }// End Method

    public function StoreJob(Request $request)
{
    $request->validate([
        'name' => 'required',
        'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    // Upload icon image
    $image = $request->file('icon');
    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    $save_url = 'upload/job_category/' . $name_gen;

    // Move image to public/upload/job_category/
    $image->move(public_path('upload/job_category/'), $name_gen);

    // Save data
    $obj = new JobCategories();
    $obj->name = $request->name;
    $obj->icon = $save_url;
    $obj->save();

    return redirect()->route('all.job')->with('success', 'Job Category Saved Successfully');
}// End Method


    public function EditJob($id)
    {
        $job_categorys = JobCategories::findOrFail($id);
        return view('admin.jobcategories.edit_job',compact('job_categorys'));
    }// End Method

    public function UpdateJob(Request $request)
{
    $jobcategory_id = $request->id;

    $request->validate([
        'name' => 'required',
        'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    $jobCategory = JobCategories::findOrFail($jobcategory_id);
    $jobCategory->name = $request->name;

    if ($request->file('icon')) {
        // Upload new icon
        $image = $request->file('icon');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'upload/job_category/' . $name_gen;

        // Move the image
        $image->move(public_path('upload/job_category/'), $name_gen);

        // Optional: delete old image if exists
        if (file_exists(public_path($jobCategory->icon)) && !empty($jobCategory->icon)) {
            unlink(public_path($jobCategory->icon));
        }

        $jobCategory->icon = $save_url;
    }

    $jobCategory->save();

    return redirect()->route('all.job')->with('success', 'Job Category Updated Successfully');
}// End Methods

    public function DeleteJob($id)
    {
        JobCategories::where('id',$id)->delete();
        return redirect()->route('all.job');
    }// End Method

}
