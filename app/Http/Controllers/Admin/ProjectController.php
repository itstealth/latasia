<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Project;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function AllProject()
    {
        $employers = Employer::latest()->get();
        $projects = Project::latest()->get();
        return view('admin.project.all_project',compact('employers','projects'));

    } // End Methods

     public function AddProject()
    {
        $employers = Employer::latest()->get();
        return view('admin.project.project_add',compact('employers'));
    } // End Method

    public function StoreProject(Request $request)
    {


        Project::create([
            'employer_id'   => $request->employer_id,
            'project_name'  => $request->project_name,
            'description'   => $request->description,
            'project_code'  => $request->project_code,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
            'status'        => $request->status,
            'created_at'    => Carbon::now('Asia/Kolkata'),
            'updated_at'    => Carbon::now('Asia/Kolkata'),
            
             
        ]);

        return redirect()->route('all.project');
    }

     public function EditProject($id)
    {
        $project = Project::findOrFail($id);
        $employers = Employer::latest()->get();
        return view('admin.project.project_edit', compact('project', 'employers'));
    } // End Method

    public function UpdateProject(Request $request, $id)
{
    $project = Project::findOrFail($id);

    $request->validate([
        'employer_id'  => 'required|exists:employers,id',
        'project_name' => 'required|string|max:255',
        'status'       => 'required|in:active,completed,on_hold',
        'start_date'   => 'required|date',
        'end_date'     => 'nullable|date|after_or_equal:start_date',
    ]);

    $project->update([
        'employer_id'  => $request->employer_id,
        'project_name' => $request->project_name,
        'status'       => $request->status,
        'start_date'   => $request->start_date,
        'end_date'     => $request->end_date,
        'description' => $request->description,
    ]);

    return redirect()->route('all.project');
}

 

    public function DeleteProject($id)
    {
        Project::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Project deleted successfully');
    } // End Method

    public function ChangeProjectStatus($id)
{
    $project = Project::findOrFail($id);

    $statusFlow = [
        'active'    => 'on_hold',
        'on_hold'   => 'completed',
        'completed' => 'active',
    ];

    $project->status = $statusFlow[$project->status];
    $project->save();

    return back()->with('success', 'Project status changed');
}

public function byEmployer($employerId)
{
    return Project::where('employer_id', $employerId)
        ->select('id', 'project_name')
        ->get();
}


}
