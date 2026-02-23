<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Project;
use App\Models\Position;
use App\Models\Recruiter;
use App\Models\Vacancy;
use Illuminate\Support\Str;
use Carbon\Carbon;

class VacancyController extends Controller
{
   public function AllVacancy()
    {
        $employers = Employer::latest()->get();
        $projects = Project::latest()->get();
        $positions = Position::latest()->get();
        $recruiters = Recruiter::latest()->get();
        $vacancies = Vacancy::latest()->get();
        return view('admin.vacancy.all_vacancy',compact('employers','projects','positions','recruiters','vacancies'));

    } // End Methods

     public function AddVacancy()
    {
        $employers = Employer::latest()->get();
        $projects = Project::latest()->get();
        $positions = Position::latest()->get();
        $recruiters = Recruiter::latest()->get();
        return view('admin.vacancy.vacancy_add',compact('employers','projects','positions','recruiters'));
    } // End Method

    public function StoreVacancy(Request $request)
    {
        
        Vacancy::create([
            'employer_id' => $request->employer_id,
            'project_id' => $request->project_id,
            'position_id' => $request->position_id,
            'recruiter_id' => $request->recruiter_id,
            'openings' => $request->openings,
            'billing_rate' => $request->billing_rate,
            'billing_model' => $request->billing_model,
            'status' => 'Open',
            'created_at' => Carbon::now('Asia/Kolkata'),
            'updated_at' => Carbon::now('Asia/Kolkata'),
        ]);

        return redirect()->route('all.vacancy');
    }

     public function EditVacancy($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $employers = Employer::latest()->get();
        $projects = Project::latest()->get();
        $positions = Position::latest()->get();
        $recruiters = Recruiter::latest()->get();
        return view('admin.vacancy.vacancy_edit', compact('vacancy', 'employers', 'projects', 'positions', 'recruiters'));
    } // End Method

    public function UpdateVacancy(Request $request, $id)
{
    $vacancy = Vacancy::findOrFail($id);

    

    $vacancy->update([
        'employer_id'  => $request->employer_id,
        'project_id' => $request->project_id,
        'position_id' => $request->position_id,
        'recruiter_id' => $request->recruiter_id,
        'openings'     => $request->openings,
        'billing_model' => $request->billing_model,
        'billing_rate' => $request->billing_rate,
    ]);

    return redirect()->route('all.vacancy');
}


    public function DeleteVacancy($id)
    {
        Vacancy::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Vacancy deleted successfully');
    } // End Method

    public function ChangeVacancyStatus($id)
{
    $vacancy = Vacancy::findOrFail($id);

    // Status flow
    switch ($vacancy->status) {
        case 'open':
            $vacancy->status = 'filled';
            break;

        case 'filled':
            $vacancy->status = 'closed';
            break;

        case 'closed':
        default:
            $vacancy->status = 'open';
            break;
    }

    $vacancy->save();

    return redirect()->back()->with('success', 'Vacancy status updated');
}
public function byProject($projectId)
{
    return Vacancy::where('project_id', $projectId)
        ->select('id', 'openings')
        ->get();
}

           
    }

