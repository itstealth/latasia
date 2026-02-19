<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Position;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PositionController extends Controller
{
    public function AllPosition()
    {
        $positions = Position::latest()->get();
        return view('admin.position.all_position',compact('positions'));

    } // End Methods

     public function AddPosition()
    {
        $projects = Project::latest()->get();
        return view('admin.position.position_add',compact('projects'));
    } // End Method

    public function StorePosition(Request $request)
    {


        Position::create([
            'project_id'   => $request->project_id,
            'title'        => $request->title,
            'skills'      => $request->skills,
            'experience'  => $request->experience,
            'employment_type' => $request->employment_type,
            'status'        => '1',
            'created_at'    => Carbon::now('Asia/Kolkata'),
            'updated_at'    => Carbon::now('Asia/Kolkata'),
        ]);
 
        return redirect()->route('all.position');
           }

          public function EditPosition($id)
    {
        $position = Position::findOrFail($id);
        $projects = Project::latest()->get();
        return view('admin.position.position_edit', compact('position', 'projects'));
    } // End Method  

    public function UpdatePosition(Request $request, $id)
{
    // Find the position
    $position = Position::findOrFail($id);

    // Validate the request
    $request->validate([
        'project_id'      => 'required|exists:projects,id',
        'title'           => 'required|string|max:255',
        'skills'          => 'nullable|string',
        'experience'      => 'required|integer|min:0',
        'employment_type' => 'required|in:full_time,part_time,contract,hourly',
       
    ]);

    // Update the position
    $position->update([
        'project_id'      => $request->project_id,
        'title'           => $request->title,
        'skills'          => $request->skills,
        'experience'      => $request->experience,
        'employment_type' => $request->employment_type,
        
        // updated_at is automatically handled by Laravel
    ]);

    return redirect()->route('all.position');
}
public function DeletePosition($id)
    {
        Position::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Position deleted successfully');
    } // End Method

    public function ChangePositionStatus($id)
    {
        $position = Position::findOrFail($id);
        $position->status = !$position->status;
        $position->save();

        return redirect()->back()->with('success', 'Position status changed successfully');
    } // End Method
}
