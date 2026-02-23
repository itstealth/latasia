<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\RecruiterCommissionRule;
use App\Models\Vacancy;
use App\Models\Recruiter;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RecruiterCommissionRuleController extends Controller
{
     public function AllRecruiterCommissionRules()
    {
    
        $rules = RecruiterCommissionRule::with([
        'recruiter',
        'employer',
        'vacancy'
    ])->latest()->get();

    return view('admin.commission_rules.all_recruiter_commission_rules', compact('rules'));

    } // End Methods

    public function AddRecruiterCommissionRule()
    {
        $employers = Employer::latest()->get();
        $recruiters = Recruiter::latest()->get();
        $vacancies = Vacancy::latest()->get();

        return view('admin.commission_rules.add_recruiter_commission_rule', compact('employers', 'recruiters', 'vacancies'));
    } // End Method

    public function StoreRecruiterCommissionRule(Request $request)
    {
        
        RecruiterCommissionRule::create([
            'recruiter_id' => $request->recruiter_id,
            'employer_id'  => $request->employer_id,
            'vacancy_id'   => $request->vacancy_id, // can be NULL
           'commission_type' => $request->commission_type,
           'commission_value' => $request->commission_value,
            'valid_months' => $request->valid_months,
            'status' => $request->status,
           
            'created_at' => Carbon::now('Asia/Kolkata'),
            'updated_at' => Carbon::now('Asia/Kolkata'),
        ]);

        return redirect()->route('all.recruiter.commission.rules');
    }// End Method

     public function EditRecruiterCommissionRule($id)
    {
        $recruiterCommissionRule = RecruiterCommissionRule::findOrFail($id);
        $employers = Employer::latest()->get();
        $recruiters = Recruiter::latest()->get();
        $vacancies = Vacancy::latest()->get();

        return view('admin.commission_rules.edit_recruiter_commission_rule', compact('recruiterCommissionRule', 'employers', 'recruiters', 'vacancies'));
    } // End Method

    public function UpdateRecruiterCommissionRule(Request $request, $id)
{
    

     $rule = RecruiterCommissionRule::findOrFail($id);

    $rule->update([
        'recruiter_id' => $request->recruiter_id,
        'employer_id'  => $request->employer_id,
        'vacancy_id'   => $request->vacancy_id,
        'commission_type' => $request->commission_type,
        'commission_value' => $request->commission_value,
        'valid_months' => $request->valid_months,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('all.recruiter.commission.rules');
}// End Method

public function DeleteRecruiterCommissionRule($id)
    {
        RecruiterCommissionRule::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Recruiter Commission Rule deleted successfully');
    } // End Method
}
