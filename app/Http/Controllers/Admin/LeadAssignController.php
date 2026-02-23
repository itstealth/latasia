<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recruiter;
use App\Models\SocialMediaLeads;
use App\Imports\SocialMediaLeadsImport;
use Maatwebsite\Excel\Facades\Excel;


class LeadAssignController extends Controller
{
    public function LeadAssign()
    {
        $recruiter =Recruiter::OrderBy('id','ASC')->get();
        $partner_leads = SocialMediaLeads::latest()
        ->where('recruiter', 0)
        ->orderBy('id', 'ASC')
        ->get();
        return view('admin.assign.socialmedia_upload',compact('recruiter','partner_leads'));
    }// End Method

    public function ImportSocialMedia(Request $request)
{
    $request->validate([
        'filename' => 'required|mimes:xlsx,xls,csv|max:5120',
    ]);

    try {
        $file = $request->file('filename');
        $originalName = $file->getClientOriginalName();

        // ✅ PASS filename to import
        Excel::import(new SocialMediaLeadsImport($originalName), $file);

        return redirect()->back()->with([
            'message' => 'Social Media Leads Imported Successfully',
            'alert-type' => 'success'
        ]);

    } catch (\Throwable $e) {
        return redirect()->back()->with([
            'message' => 'Import Failed: '.$e->getMessage(),
            'alert-type' => 'error'
        ]);
    }
}// End Method



public function AssignSocialMediaLeads(Request $request)
{
    // ✅ Validation
    $request->validate([
        'lead_ids'     => 'required|array',
        'recruiter_id' => 'required|exists:recruiters,id',
    ]);

    $leadIds     = $request->lead_ids;
    $recruiterId = $request->recruiter_id;

    // ✅ Get Recruiter
    $recruiter = Recruiter::findOrFail($recruiterId);

    foreach ($leadIds as $leadId) {

        $lead = SocialMediaLeads::find($leadId);

        if (!$lead) {
            continue;
        }

        // ✅ Assign recruiter
        $lead->update([
            'recruiter' => $recruiterId,
            'status'    => 1, // optional: assigned
        ]);

        // 🔹 OPTIONAL: Email / Notification logic
        /*
        Mail::to($recruiter->email)->send(
            new LeadAssignedMail($lead)
        );
        */
    }

    return redirect()
        ->route('lead.assign')
        ->with('success', 'Leads assigned successfully!');
}


     public function AssignEmployerLeads()
    { 
        $recruiter =Recruiter::OrderBy('id','ASC')->get();
<<<<<<< HEAD
        $employer_leads = SocialMediaLeads::latest()
=======
        $employer_leads = PartnerUpload::latest()
>>>>>>> 696cd71a52571175287ca3b46bd59744593fc306
        ->where('recruiter', 0)
        ->orderBy('id', 'ASC')
        ->get();
        return view('admin.assign.employer_upload',compact('recruiter','employer_leads'));
    }// End Method

    
}
