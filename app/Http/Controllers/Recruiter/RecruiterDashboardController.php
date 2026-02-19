<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Recruiter;
use App\Models\Employer;
use App\Models\Employee;
use App\Models\Vacancy;
use App\Models\Lead;
use App\Models\EmployeeCompliance;
use App\Models\EmployeeDeployment;
use App\Models\SocialMediaLeads;
use App\Models\Invoice;
use App\Models\EmployeeTimesheet;
use App\Models\Project;
use App\Models\InvoiceItem;
use App\Models\JobCategories;
use App\Models\JobSalary;
use App\Models\RecruiterCommission;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

class RecruiterDashboardController extends Controller
{
    public function index()
    {
        return view('recruiter.index');
    }

    public function RecruiterLogout()
    {
        auth()->guard('recruiter')->logout();
        return redirect()->route('recruiter.login');
    }

    public function RecruiterLeads()
    {
        // ✅ Get logged-in recruiter object
        $recruiter = Auth::guard('recruiter')->user();

        // ✅ Safety check
        if (!$recruiter) {
            return redirect()->route('recruiter.login');
        }

        // ✅ Recruiter ID
        $recruiterId = $recruiter->id;

        // ✅ Fetch leads
        $partnerData = SocialMediaLeads::where('recruiter', $recruiterId)
            ->where('is_converted', 0)
            ->orderBy('id', 'desc')
            ->get();

        return view('recruiter.leads', compact('partnerData'));
    }


    public function AssignLeads()

    {

        $recruiterId = Auth::guard('recruiter')->user()->id;

        $vacancies = Vacancy::with([
            'employer',
            'project',
            'position'
        ])
            ->where('recruiter_id', $recruiterId)
            ->latest()
            ->get();

        return view('recruiter.assign_leads', compact('vacancies'));
    } // End Method

    public function RecruiterAddCandidates($vacancyId)
    {
        $vacancy = Vacancy::with('employer', 'project', 'position')->findOrFail($vacancyId);
        return view('recruiter.leads_create', compact('vacancy'));
    } // End Method

    public function RecruiterStoreLeads(Request $request)
    {
        // ✅ Validate
        $validated = $request->validate([
            'vacancy_id'       => 'required|exists:vacancies,id',
            'name'             => 'required|string|max:100',
            'phone'            => 'required|string|max:20',
            'email'            => 'nullable|email|max:100',
            'current_country'  => 'nullable|string|max:100',
            'experience'       => 'nullable|string|max:50',
            'skills'           => 'nullable|string|max:255',
        ]);

        // ✅ Load Vacancy
        $vacancy = Vacancy::with(['employer', 'project', 'position'])
            ->findOrFail($request->vacancy_id);

        // ✅ Generate Lead Code
        $leadCode = 'LAT-LEAD-' . str_pad(Lead::count() + 1, 4, '0', STR_PAD_LEFT);

        // ✅ Create Lead
        $lead = Lead::create([
            'lead_code'         => $leadCode,
            'lead_source_type'  => 'walk_in',        // Must match column type
            'lead_source_name'  => 'Recruiter Manual',
            'name'              => $validated['name'],
            'email'             => $validated['email'] ?? null,
            'phone'             => $validated['phone'],
            'country'           => $validated['current_country'] ?? null,
            'current_location'  => $validated['current_country'] ?? null,
            'experience'        => $validated['experience'] ?? null,
            'skills'            => $validated['skills'] ?? null,
            'job_title'         => $vacancy->title,
            'employer_id'       => $vacancy->employer_id,
            'project_id'        => $vacancy->project_id,
            'vacancy_id'        => $vacancy->id,
            'position_id'       => $vacancy->position_id,
            'recruiter_id'      => auth('recruiter')->id(),
            'assigned_at'       => now(),
            'lead_disposition'  => 'interested',
            'lead_stage'        => 'shortlisted',
            'is_employee'       => 0,
            'status'            => 1,
        ]);

        return redirect()
            ->route('recruiter.lead.fulldetails', $lead->id)
            ->with('success', 'Lead created and shortlisted successfully');
    }

    public function leadFullDetailPage(Request $request, $lead_id)
{
    $lead = Lead::with([
        'vacancy',
        'employer',
        'recruiter',
        'employee',
        'employee.compliance',
        'employee.deployment',
        'employee.timesheets',
        'employee.invoices',
        'employee.commissions',
    ])->findOrFail($lead_id);

    $employee    = $lead->employee;
    $compliance  = $employee?->compliance;
    $deployment  = $employee?->deployment;
    $timesheets  = $employee?->timesheets ?? collect();
    $invoices    = $employee?->invoices ?? collect();
    $commissions = $employee?->commissions ?? collect();

    $employers = Employer::where('status', 1)->get();
    $recruiters = Recruiter::where('status', 1)->get();
    /*
    |--------------------------------------------------------------------------
    | TIMESHEET LOGIC (UNCHANGED)
    |--------------------------------------------------------------------------
    */
    $workDate = $request->get('work_date');
    $currentTimesheet = null;

    if ($employee && $deployment) {

        if ($workDate) {
            $currentTimesheet = EmployeeTimesheet::where('employee_id', $employee->id)
                ->where('deployment_id', $deployment->id)
                ->where('work_date', $workDate)
                ->first();
        }

        if (!$currentTimesheet) {
            $currentTimesheet = EmployeeTimesheet::where('employee_id', $employee->id)
                ->where('deployment_id', $deployment->id)
                ->latest('work_date')
                ->first();
        }
    }

    /*
    |--------------------------------------------------------------------------
    | ✅ NEW SAFE ADDITION (NO BREAKING)
    |--------------------------------------------------------------------------
    */

    // Lead se hi project & vacancy uthao
    $projects = collect();
    $vacancies = collect();

    if ($lead->employer_id) {
        $projects = Project::where('employer_id', $lead->employer_id)->get();
    }

    if ($lead->project_id) {
        $vacancies = Vacancy::where('project_id', $lead->project_id)->get();
    }

    $projectId = $deployment?->project_id;

    $countries = Country::orderBy('name')->get();

   $jobCategories = JobCategories::orderBy('name')->get();
   $jobSalaries   = JobSalary::orderBy('name')->get();

    return view('recruiter.leads_full_detils', compact(
        'lead',
        'employee',
        'compliance',
        'deployment',
        'timesheets',
        'invoices',
        'commissions',
        'employers',
        'projects',      // ✅ added
        'vacancies',     // ✅ added
        'currentTimesheet',
        'workDate',
        'projectId',
        'countries',
        'jobCategories',
        'jobSalaries',
        'recruiters'  // ✅ added
    ));
}





    public function Action($id)
    {
        $socialLead = SocialMediaLeads::findOrFail($id);

        return view('recruiter.leads_action', compact('socialLead'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'social_lead_id' => 'required|exists:social_media_leads,id',
            'lead_disposition' => 'required|in:not_connected,wrong_number,not_interested,interested,callback,converted',
        ]);

        $socialLead = SocialMediaLeads::findOrFail($request->social_lead_id);

        // 🚫 Prevent duplicate conversion
        if ($socialLead->is_converted == 1) {
            return redirect()->back()->with('error', 'Lead already converted');
        }

        // ✅ Create Lead
        $lead = Lead::create([
            'lead_code' => 'LAT-LEAD-' . str_pad(Lead::count() + 1, 4, '0', STR_PAD_LEFT),

            // Source
            'lead_source_type' => 'facebook',
            'lead_source_name' => 'Facebook',

            // Candidate
            'name' => $socialLead->name,
            'email' => $socialLead->email,
            'phone' => $socialLead->phone,
            'country' => $socialLead->country,
            'city' => $socialLead->city,
            'current_location' => $socialLead->current_location,
            'experience' => $socialLead->experience,
            'education' => $socialLead->education,

            // Passport
            'passport_number' => $socialLead->passport_number,
            'passport_type' => $socialLead->passport_type,
            'overseas_experience' => $socialLead->overseas_experience,

            // Job
            'job_title' => $socialLead->job_title,
            'skills' => $socialLead->skills,

            // Recruiter
            'recruiter_id' => auth('recruiter')->id(),
            'assigned_at' => now(),

            // Lead status
            'lead_disposition' => $request->lead_disposition,
            'lead_stage' => 'screening',

            // Conversion
            'is_employee' => $request->lead_disposition === 'converted',
            'converted_at' => $request->lead_disposition === 'converted' ? now() : null,

            'status' => 1,
        ]);

        // ✅ Hide from social media leads list
        $socialLead->update([
            'is_converted' => 1,
        ]);

        // 🔁 Redirect logic
        if ($request->lead_disposition === 'interested') {
            return redirect()
                ->route('recruiter.lead.fulldetails', $lead->id)
                ->with('success', 'Lead marked as Interested');
        }

        return redirect()
            ->route('recruiter.leads')
            ->with('success', 'Lead successfully processed');
    }

   public function RecruiterAllLeads(Request $request)
{
    // ✅ Get logged-in recruiter
    $recruiter = Auth::guard('recruiter')->user();

    if (!$recruiter) {
        return redirect()->route('recruiter.login');
    }

    // ✅ Base query
    $query = Lead::with('countryRelation')
        ->where('recruiter_id', $recruiter->id);

    // ✅ Disposition logic
    if ($request->filled('disposition')) {
        // If user selects a disposition, apply it
        $query->where('lead_disposition', $request->disposition);
    } else {
        // Default: exclude "interested"
        $query->where('lead_disposition', '!=', 'interested');
    }

    // ✅ Filters
    if ($request->filled('country')) {
        $query->where('country', $request->country);
    }

    if ($request->filled('location')) {
        $query->where('current_location', $request->location);
    }

    if ($request->filled('job_title')) {
        $query->where('job_title', $request->job_title);
    }

    if ($request->filled('project_id')) {
        $query->where('project_id', $request->project_id);
    }

    if ($request->filled('start_date')) {
        $query->whereDate('created_at', '>=', $request->start_date);
    }

    if ($request->filled('end_date')) {
        $query->whereDate('created_at', '<=', $request->end_date);
    }

    // ✅ Fetch leads
    $all_leads = $query->orderBy('id', 'desc')->get();

    // ✅ Dropdown data
     $countryList = Country::orderBy('name')->get();
   
    $locations = Lead::distinct()->pluck('current_location')->filter();
    $jobTitles = Lead::distinct()->pluck('job_title')->filter();
    $projects  = Project::orderBy('project_name')->get();

    return view('recruiter.all_leads_filtered', compact(
        'all_leads',
       
        'countryList',
        'locations',
        'jobTitles',
        'projects'
    ));
}


   public function RecruiterInterestedLeads(Request $request)
{
    $recruiter = Auth::guard('recruiter')->user();

    if (!$recruiter) {
        return redirect()->route('recruiter.login');
    }

    // ✅ Base query with country relation
    $query = Lead::with('countryRelation')
        ->where('recruiter_id', $recruiter->id);

    // ✅ Default disposition
    if ($request->filled('disposition')) {
        $query->where('lead_disposition', $request->disposition);
    } else {
        $query->where('lead_disposition', 'interested');
    }

    // ✅ Filters
    if ($request->filled('country')) {
        $query->where('country', $request->country); // country ID
    }

    if ($request->filled('location')) {
        $query->where('current_location', $request->location);
    }

    if ($request->filled('job_title')) {
        $query->where('job_title', $request->job_title);
    }

    if ($request->filled('project_id')) {
        $query->where('project_id', $request->project_id);
    }

    if ($request->filled('start_date')) {
        $query->whereDate('created_at', '>=', $request->start_date);
    }

    if ($request->filled('end_date')) {
        $query->whereDate('created_at', '<=', $request->end_date);
    }

    // ✅ Final data
    $all_leads = $query->orderBy('id', 'desc')->get();

    // ✅ Dropdown data (CORRECT)
    $countryList = Country::orderBy('name')->get(); // full country table
    $locations   = Lead::distinct()->pluck('current_location')->filter();
    $jobTitles   = Lead::distinct()->pluck('job_title')->filter();
    $projects    = Project::orderBy('project_name')->get();

    return view('recruiter.all_leads', compact(
        'all_leads',
        'countryList',
        'locations',
        'jobTitles',
        'projects'
    ));
}


    public function show(Lead $lead)
    {
        $employers = Employer::where('status', 1)->get();

        return view('recruiter.leads_show', compact('lead', 'employers'));
    } // End Method

   public function getEmployerProjects($employerId)
{
    return response()->json(
        Project::where('employer_id', $employerId)
            ->select('id', 'project_name')
            ->get()
    );
}

public function getProjectVacancies($projectId)
{
    return response()->json(
        Vacancy::where('project_id', $projectId)
            ->select('id', 'openings')
            ->get()
    );
}

    public function mapToVacancy(Request $request, Lead $lead)
    {
        // 🔹 Case 1: Vacancy mapping submitted
        if ($request->filled('vacancy_id')) {

            $validated = $request->validate([
                'employer_id' => 'required|exists:employers,id',
                'project_id'  => 'required|exists:projects,id',
                'vacancy_id'  => 'required|exists:vacancies,id',
            ]);

            // 🔐 Ensure vacancy belongs to project
            $vacancy = Vacancy::where('id', $validated['vacancy_id'])
                ->where('project_id', $validated['project_id'])
                ->firstOrFail();

            $lead->update([
                'employer_id' => $validated['employer_id'],
                'project_id'  => $validated['project_id'],
                'vacancy_id'  => $validated['vacancy_id'],
                'position_id' => $vacancy->position_id,
                'lead_stage'  => 'shortlisted',
            ]);

            return back()->with('success', 'Lead mapped & shortlisted successfully');
        }

        // 🔹 Case 2: No vacancy selected (interested only)
        $lead->update([
            'lead_stage' => 'interested',
        ]);

        return back()->with('success', 'Lead marked as interested (job mapping pending)');
    }



    private function generateEmployeeCode()
    {
        $year = now()->year;

        $lastEmployee = Employee::whereYear('created_at', $year)
            ->whereNotNull('employee_code')
            ->orderBy('id', 'desc')
            ->first();

        if ($lastEmployee && preg_match('/EMP-\d{4}-(\d+)/', $lastEmployee->employee_code, $matches)) {
            $number = (int) $matches[1] + 1;
        } else {
            $number = 1;
        }

        return 'EMP-' . $year . '-' . str_pad($number, 4, '0', STR_PAD_LEFT);
    }


    public function storeEmployee(Request $request)
    {
        $request->validate([
            'lead_id'    => 'required|exists:leads,id',
            'first_name' => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
            'status'     => 'required|in:active,on_hold,blacklisted',
        ]);

        DB::beginTransaction();

        try {
            $recruiter = Auth::guard('recruiter')->user();
            if (!$recruiter) {
                throw new \Exception('Recruiter not authenticated');
            }

            $lead = Lead::lockForUpdate()->findOrFail($request->lead_id);

            // 🔥 FIND OR CREATE EMPLOYEE
            $employee = Employee::where('lead_id', $lead->id)->first();

            if (!$employee) {
                do {
                    $employeeCode = 'EMP-' . rand(100000, 999999);
                } while (Employee::where('employee_code', $employeeCode)->exists());

                $employee = new Employee();
                $employee->employee_code = $employeeCode;
                $employee->lead_id = $lead->id;
                $employee->recruiter_id = $recruiter->id;

                $lead->update([
                    'is_employee'  => 1,
                    'lead_stage'   => 'converted',
                    'converted_at' => now(),
                ]);
            }

            // 🔄 UPDATE COMMON FIELDS
            $employee->fill([
                'first_name'         => $request->first_name,
                'middle_name'        => $request->middle_name,
                'last_name'          => $request->last_name,
                'email'              => $request->email,
                'phone'              => $request->phone,
                'gender'             => $request->gender,
                'passport_number'    => $request->passport_number,
                'passport_type'      => $request->passport_type,
                'passport_expiry'    => $request->passport_expiry,
                'nationality'        => $request->nationality ?? 'India',
                'current_location'   => $request->current_location,
                'experience_years'   => $request->experience_years,
                'education'          => $request->education,
                'primary_skill'      => $request->primary_skill,
                'skills'             => $request->skills,
                'documents_complete' => $request->boolean('documents_complete'),
                'test_required'      => $request->boolean('test_required'),
                'test_cleared'       => $request->boolean('test_cleared'),
                'medical_cleared'    => $request->boolean('medical_cleared'),
                'deployment_ready'   => $request->boolean('deployment_ready'),
                'status'             => $request->status,
                'deployment_status'  => $request->deployment_status,
            ]);

            $employee->save();

            DB::commit();

            return back()->with('success', 'Employee saved successfully');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function storeEmployeeCompliance(Request $request, Employee $employee)
    {
        $request->validate([
            'medical_status'      => 'required|in:pending,fit,unfit',
            'medical_date'        => 'nullable|date',
            'medical_report'      => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'trade_test_status'   => 'required|in:pending,pass,fail',
            'trade_test_date'     => 'nullable|date',
            'police_verification' => 'required|in:pending,verified,rejected',
            'visa_status'         => 'required|in:pending,approved,rejected',
            'visa_issue_date'     => 'nullable|date',
            'remarks'             => 'nullable|string',
        ]);

        $compliance = EmployeeCompliance::firstOrNew([
            'employee_id' => $employee->id,
        ]);

        // 📂 STORE FILE IN upload/documents
        if ($request->hasFile('medical_report')) {

            // Optional: delete old file
            if ($compliance->medical_report && Storage::disk('public')->exists($compliance->medical_report)) {
                Storage::disk('public')->delete($compliance->medical_report);
            }

            $path = $request->file('medical_report')
                ->store('upload/documents', 'public');

            $compliance->medical_report = $path;
        }

        $compliance->fill([
            'medical_status'      => $request->medical_status,
            'medical_date'        => $request->medical_date,
            'trade_test_status'   => $request->trade_test_status,
            'trade_test_date'     => $request->trade_test_date,
            'police_verification' => $request->police_verification,
            'visa_status'         => $request->visa_status,
            'visa_issue_date'     => $request->visa_issue_date,
            'remarks'             => $request->remarks,
        ]);

        $compliance->save();

        return back()->with('success', 'Employee compliance saved successfully');
    }




    public function storeDeployment(Request $request, Employee $employee)
    {
        $request->validate([
            'employer_id'       => 'required|exists:employers,id',
            'project_id'        => 'nullable|exists:projects,id',
            'vacancy_id'        => 'nullable|exists:vacancies,id',
            'deployment_status' => 'required|in:planned,departed,joined,on_hold,cancelled,completed',
            'departure_date'    => 'nullable|date',
            'joining_date'      => 'nullable|date',
            'return_date'       => 'nullable|date',
        ]);

        $data = $request->only([
            'employer_id',
            'project_id',
            'vacancy_id',
            'deployment_status',
            'departure_date',
            'joining_date',
            'return_date',
            'country',
            'city',
            'site_location',
            'remarks',
        ]);

        EmployeeDeployment::updateOrCreate(
            ['employee_id' => $employee->id],
            $data + ['updated_at' => now()]
        );

        return back()->with('success', 'Deployment saved successfully');
    }



    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'employee_id'     => 'required|exists:employees,id',
            'deployment_id'   => 'required|exists:employee_deployments,id',
            'work_date'       => 'required|date',
            'hours_worked'    => 'required|numeric|min:0',
            'overtime_hours'  => 'nullable|numeric|min:0',
            'rate_per_hour'   => 'required|numeric|min:0',
            'overtime_rate'   => 'nullable|numeric|min:0',
            'remarks'         => 'nullable|string',
        ]);

        $overtimeHours = $validated['overtime_hours'] ?? 0;
        $overtimeRate  = $validated['overtime_rate'] ?? 0;

        $total =
            ($validated['hours_worked'] * $validated['rate_per_hour']) +
            ($overtimeHours * $overtimeRate);

        // 🔥 THIS IS THE MAIN FIX
        EmployeeTimesheet::updateOrCreate(
            [
                'employee_id'   => $validated['employee_id'],
                'deployment_id' => $validated['deployment_id'],
                'work_date'     => $validated['work_date'],
            ],
            [
                'hours_worked'   => $validated['hours_worked'],
                'overtime_hours' => $overtimeHours,
                'rate_per_hour'  => $validated['rate_per_hour'],
                'overtime_rate'  => $overtimeRate,
                'total_amount'   => $total,
                'remarks'        => $validated['remarks'],
                'status'         => 'pending',
            ]
        );

        return back()->with('success', 'Timesheet saved successfully');
    }

    public function StoreOrUpdateInvoice(Request $request)
    {
        $validated = $request->validate([
            'employer_id'  => 'required|exists:employers,id',
            'project_id'   => 'required|exists:projects,id',
            'invoice_date' => 'required|date',
            'subtotal'     => 'required|numeric|min:0',
            'tax'          => 'nullable|numeric|min:0',
        ]);

        $total = $validated['subtotal'] + ($validated['tax'] ?? 0);

        Invoice::create([
            'employer_id'   => $validated['employer_id'],
            'project_id'    => $validated['project_id'],
            'invoice_no'    => 'INV-' . time(),
            'invoice_date'  => $validated['invoice_date'],
            'subtotal'      => $validated['subtotal'],
            'tax'           => $validated['tax'] ?? 0,
            'total_amount'  => $total,
            'payment_status' => 'pending',
        ]);

        return back()->with([
            'success'   => 'Invoice created successfully',
            'activeTab' => 'billing'
        ]);
    }


       public function UpdateLeadOverview(Request $request, $id)
{
    $recruiter = Auth::guard('recruiter')->user();

    if (!$recruiter) {
        return redirect()->route('recruiter.login');
    }

    $lead = Lead::findOrFail($id);

    $validated = $request->validate([
        'lead_code' => 'nullable|string|max:50',
        'lead_source_name' => 'nullable|string|max:255',
        'lead_disposition' => 'required|string',
        'recruiter_id' => 'nullable|exists:recruiters,id',

        'name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:20',
        'current_location' => 'nullable|string|max:255',

        'passport_number' => 'nullable|string|max:50',
        'passport_type' => 'nullable|string|max:50',
        'overseas_experience' => 'nullable|string|max:50',
        'experience' => 'nullable|string|max:50',

        'job_title' => 'nullable|string|max:255',
        'skills' => 'nullable|string|max:255',

        'country' => 'nullable|integer|exists:countries,id',
        'employer_id' => 'nullable|integer|exists:employers,id',

        'category_id' => 'nullable|integer|exists:job_categories,id',
        'salary_id' => 'nullable|integer|exists:job_salaries,id',

        'trc_status' => 'nullable|string|max:255',
        'trc_country' => 'nullable|integer|exists:countries,id',
        'trc_validity' => 'nullable|string|max:255',
        'trc_expiry_date' => 'nullable|date',
        'yellowcard_stamping_date' => 'nullable|date',

        'city' => 'nullable|string|max:255',
    ]);

    $lead->update($validated);

    return back()->with('success', 'Lead updated successfully');
}


}
