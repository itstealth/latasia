<?php

namespace App\Http\Controllers;
use App\Models\Recruiter;
use App\Models\Jobs;
use App\Models\JobCategories;
use App\Models\JobExperience;
use App\Models\JobGender;
use App\Models\JobLocation;
use App\Models\JobSalary;
use App\Models\JobType;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\SignUp;
use App\Models\Careers;

use App\Models\Lead;



use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SocialMediaLeadsImport;
use Illuminate\Support\Facades\DB;
class AdminJobCreateController extends Controller
{
    public function AddnewJobs()
    {
        $job_cat =JobCategories::OrderBy('name','ASC')->get();
        $job_exp =JobExperience::OrderBy('name','ASC')->get();
        $job_gender =JobGender::OrderBy('name','ASC')->get();
        $job_location =JobLocation::OrderBy('name','ASC')->get();
        $job_salary =JobSalary::OrderBy('name','ASC')->get();
        $job_type =JobType::OrderBy('name','ASC')->get();
        
       
        return view('admin.create_jobs.add_new_jobs',compact('job_cat','job_exp','job_gender','job_location','job_salary','job_salary','job_type'));
    }// End Method

    public function StoreNewJobs(Request $request)
    {
        $image = $request->file('job_image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        $save_url = 'upload/job_image/' . $name_gen;

        // Move the uploaded file to the specified folder
         $image->move(public_path('upload/job_image'), $name_gen);

        // Facebook Images Upload

         $image1 = $request->file('social_image');

         $name_gen1 = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();

        $save_url1 = 'upload/fb_image/' . $name_gen1;

        // Move the uploaded file to the specified folder
         $image1->move(public_path('upload/fb_image'), $name_gen1);

         Jobs::insert([
            
            'project_id' => $request->project_id,
            'title' => $request->title,
            'socal_media_name' => $request->socal_media_name,
            'description' => $request->description,
            'responsibility' => $request->responsibility,
            'job_image' => $save_url,
            'social_image' => $save_url1,
            'skill' => $request->skill,
            'education' => $request->education,
            'benefit'=>$request->benefit,
            'deadline'=>$request->deadline,
            'vacancy'=>$request->vacancy,
            'job_category_id'=>$request->job_category_id,
            'job_location_id'=>$request->job_location_id,
            'job_type_id'=>$request->job_type_id,
            'job_experince_id'=>$request->job_experince_id,
            'job_gender_id'=>$request->job_gender_id,
            'job_salary_id'=>$request->job_salary_id,
            'map_code'=>$request->map_code,
            'is_featured'=>$request->is_featured,
            'is_urgent'=>$request->is_urgent,
            'country'=>$request->country,
            'salary_duration'=>$request->salary_duration,
            
            'status'=>'1',
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('all.new_jobs');

    }// End Method

    public function AllNewJobs()
    {  
        $jobs = Jobs::latest()->get();
        return view('admin.create_jobs.all_new_jobs',compact('jobs'));
    }// End Method
   
    public function UpdateJobStatus($id)
    {
      $jobstatus = Jobs::Find($id);
      if($jobstatus)
      {
        if($jobstatus->status)
        {
             $jobstatus->status=0;  
        }
        else
        {
            $jobstatus->status=1;    
        }
        $jobstatus->save();
      }
      return back();
    }//End Method

    public function EditNewJobs($id)
    {
        $edit_jobs = Jobs::findOrFail($id);
        $edit_job_cat =JobCategories::OrderBy('name','ASC')->get();
        $edit_job_exp =JobExperience::OrderBy('name','ASC')->get();
        $edit_job_gender =JobGender::OrderBy('name','ASC')->get();
        $edit_job_location =JobLocation::OrderBy('name','ASC')->get();
        $edit_job_salary =JobSalary::OrderBy('name','ASC')->get();
        $edit_job_type =JobType::OrderBy('name','ASC')->get();
        

        return view('admin.create_jobs.edit_new_jobs',compact('edit_jobs','edit_job_cat','edit_job_exp','edit_job_gender','edit_job_location','edit_job_salary','edit_job_type'));
     
    }// End Method

    public function UpdateNewJobs(Request $request)
    {
        $jobs_id = $request->id;
        
        // Check if a new job image is uploaded
        if ($request->file('job_image')) {
            $job_image = $request->file('job_image');
            $job_image_name = hexdec(uniqid()) . '.' . $job_image->getClientOriginalExtension();
            $job_image_path = 'upload/job_image/' . $job_image_name;
    
            // Move the uploaded job image to the specified folder
            $job_image->move(public_path('upload/job_image'), $job_image_name);
        } else {
            // If no new job image is uploaded, retain the existing job image path
            $job_image_path = Jobs::findOrFail($jobs_id)->job_image;
        }
    
        // Check if a new social image is uploaded
        if ($request->file('social_image')) {
            $social_image = $request->file('social_image');
            $social_image_name = hexdec(uniqid()) . '.' . $social_image->getClientOriginalExtension();
            $social_image_path = 'upload/fb_image/' . $social_image_name;
    
            // Move the uploaded social image to the specified folder
            $social_image->move(public_path('upload/fb_image'), $social_image_name);
        } else {
            // If no new social image is uploaded, retain the existing social image path
            $social_image_path = Jobs::findOrFail($jobs_id)->social_image;
        }
    
        // Update the job record in the database
        Jobs::findOrFail($jobs_id)->update([
            'project_id' => $request->project_id,
            'title' => $request->title,
            'socal_media_name' => $request->socal_media_name,
            'description' => $request->description,
            'responsibility' => $request->responsibility,
            'job_image' => $job_image_path,
            'social_image' => $social_image_path,
            'skill' => $request->skill,
            'education' => $request->education,
            'benefit' => $request->benefit,
            'deadline' => $request->deadline,
            'vacancy' => $request->vacancy,
            'job_category_id' => $request->job_category_id,
            'job_location_id' => $request->job_location_id,
            'job_type_id' => $request->job_type_id,
            'job_experince_id' => $request->job_experince_id,
            'job_gender_id' => $request->job_gender_id,
            'job_salary_id' => $request->job_salary_id,
            'map_code' => $request->map_code,
            'is_featured' => $request->is_featured,
            'is_urgent' => $request->is_urgent,
            'country' => $request->country,
            'salary_duration'=>$request->salary_duration,
            'updated_at' => Carbon::now(),
        ]);
    
        // Redirect the user to the route 'all.new_jobs'
        return redirect()->route('all.new_jobs');
    }
    

    public function DeleteNewJobs($id)
    {
        Jobs:: where('id',$id)->delete();
        return redirect()->route('all.new_jobs'); 
    }// End Method

    public function AssignEvaluation()
    { 
        $evaluation_leads = Evaluation::latest()->where('recruiter', 0)->get();
        return view('admin.assign_evaluation',compact('evaluation_leads'));
    }// End Method

    public function AssignPartner()
    { 
        $recruiter =Recruiter::OrderBy('name','ASC')->get();
        $partner_leads = ApplyCandidate::latest()->where('recruiter', 0)->get();
        return view('admin.assign_partner',compact('partner_leads','recruiter'));
    }// End Method

    public function AssignLeads(Request $request)
    {
        $i=0;
        $files = $request->input('files');
        $ustatus = $request->input('recqruter');

        foreach ($files as $file) {
            $evaluation = ApplyCandidate::where('id', $file)->first();
            $partnerCode = $evaluation->vasper_code;

            $addPartner = ApplyCandidate::where('vasper_code', $partnerCode)->first();
            $pEmail = $addPartner->email;
            $pName = $addPartner->name;

            $nestUser = Recruiter::where('id', $ustatus)->first();
            $cName = $nestUser->name;
            $cMail = $nestUser->email;

            $evaluation->update(['recruiter' => $ustatus]);

            
            $i++;
        }

        // Additional logic or response if needed
        return redirect()->route('assign.partner'); 
    }// End Method
    public function AssignPartnerUploadLeads()
    { 
        $recruiter =Recruiter::OrderBy('id','ASC')->get();
        $partner_leads = PartneUpload::latest()
        ->where('recruiter', 0)
        ->orderBy('id', 'ASC')
        ->get();
        return view('admin.assign_partner_upload',compact('recruiter','partner_leads'));
    }// End Method

    public function StorePartnerUploadLeads(Request $request)
    {
        $i=0;
        $files = $request->input('files');
        $ustatus = $request->input('recqruter');

        foreach ($files as $file) {
            $evaluation = PartneUpload::where('id', $file)->first();
            $partnerCode = $evaluation->vasper_code;

            $addPartner = PartneUpload::where('vasper_code', $partnerCode)->first();
            $pEmail = $addPartner->email;
            $pName = $addPartner->name;

            $nestUser = Recruiter::where('id', $ustatus)->first();
            $cName = $nestUser->name;
            $cMail = $nestUser->email;

            $evaluation->update(['recruiter' => $ustatus]);

            $leadAssign = new LeadAssign();
            $leadAssign->lead_table = 'partne_uploads';
            $leadAssign->table_id = $file;
            $leadAssign->lead_id = 0;
            $leadAssign->recruiter = $ustatus;
            $leadAssign->assigner = 'admin';
           
            
            $leadAssign->save();
            
            $i++;
        }

        
        return redirect()->route('assign.partner.upload');   
    }// End Method

    public function UploadSocialMedia()
    {
        $recruiter =Recruiter::OrderBy('id','ASC')->get();
        $partner_leads = SocialMediaLeads::latest()
        ->where('recruiter', 0)
        ->orderBy('id', 'ASC')
        ->get();
        return view('admin.assign_socialmedia_upload',compact('recruiter','partner_leads'));
    }// End Method

    public function AssignSocialMediaLeads(Request $request)
    {
       
        

        $i=0;
        $files = $request->input('files');
        $ustatus = $request->input('recqruter');

        foreach ($files as $file) {
            $evaluation = SocialMediaLeads::where('id', $file)->first();
            $partnerCode = $evaluation->vasper_code;

            $addPartner = SocialMediaLeads::where('vasper_code', $partnerCode)->first();
            $pEmail = $addPartner->email;
            $pName = $addPartner->name;

            $nestUser = Recruiter::where('id', $ustatus)->first();
            $cName = $nestUser->name;
            $cMail = $nestUser->email;

            $evaluation->update(['recruiter' => $ustatus]);

            $leadAssign = new LeadAssign();
            $leadAssign->lead_table = 'social_media_leads';
            $leadAssign->table_id = $file;
            $leadAssign->lead_id = 0;
            $leadAssign->reqruter = $ustatus;
            $leadAssign->assigner = 'admin';
            $leadAssign->created_at = Carbon::now('Asia/Kolkata');
            
            $leadAssign->save();
            $i++;
        }

        // Additional logic or response if needed
        return redirect()->route('assign.social.media');   
    }// End Method

    public function ImportSocialMedia(Request $request)
{
    if ($request->hasFile('filename')) {
        $file = $request->file('filename');

        // Get the filename
        $filename = $file->getClientOriginalName();

        // Process the Excel file using the correct import class
        Excel::import(new SocialMediaLeadsImport($filename), $file);

        $notification = [
            'message' => 'Social Media Lead Uploaded Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    // Handle the case where no file is uploaded
    $notification = [
        'message' => 'No file uploaded',
        'alert-type' => 'error'
    ];

    return redirect()->back()->with($notification);
} // End Method


    public function ApplicationJobs()
    {
        $signups = SignUp::whereHas('rjob')->get();
       
        return view('admin.create_jobs.application_job',compact('signups'));
    }// End Method

    public function AllCareers()
    {
        $careers = Careers::latest()->get();
        return view('admin.create_jobs.all_careers',compact('careers'));
    }// End Method

    public function AddnCareers()
    {
        return view('admin.create_jobs.add_careers');
    }// End Methods

    public function StoreCareers(Request $request)
    {
        $image = $request->file('v_image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        $save_url = 'upload/careers/' . $name_gen;

        // Move the uploaded file to the specified folder
         $image->move(public_path('upload/careers'), $name_gen);

         Careers::insert([

            'v_title' => $request->v_title,
            'v_experience' => $request->v_experience,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'v_type' => $request->v_type,
            'keywords' => $request->keywords,
            'v_image' => $save_url,
            'v_description' => $request->v_description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Careers Add Successfully ',
            'alert-type' => 'success'
        );
        return redirect()->route('all.careers')->with($notification);
    }// End Method

    public function EditCareers($id)
    {
        $careers = Careers::findOrFail($id);
        return view('admin.create_jobs.edit_careers', compact('careers'));
    }// End Methods

public function UpdateCareers(Request $request)
{
    $blog_id = $request->id;
    if ($request->file('v_image')) {
        $image = $request->file('v_image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'upload/careers/' . $name_gen;
     // Move the uploaded file to the specified folder
     $image->move(public_path('upload/careers'), $name_gen);
     
     Careers::findOrfail($blog_id)->update([

           'v_title' => $request->v_title,
            'v_experience' => $request->v_experience,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'v_type' => $request->v_type,
            'keywords' => $request->keywords,
            'v_image' => $save_url,
            'v_description' => $request->v_description,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => ' Careers Update Successfully With Image ',
            'alert-type' => 'success'
        );
        return redirect()->route('all.careers')->with($notification);
    } else {

        Careers::findOrfail($blog_id)->update([

           'v_title' => $request->v_title,
            'v_experience' => $request->v_experience,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'v_type' => $request->v_type,
            'keywords' => $request->keywords,
            
            'v_description' => $request->v_description,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Careers Update Successfully Without Images ',
            'alert-type' => 'success'
        );
        return redirect()->route('all.careers')->with($notification);
    }
}// End Methods

    public function DeleteCareers($id)
    { 
        $portfolio = Careers::findorFail($id);

        Careers::findorFail($id)->delete();

        $notification = array(
            'message' => 'Careers Deleted Successfully ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }// End Methods


    public function UploadWebsite()
    {
        $recruiter =Recruiter::OrderBy('id','ASC')->get();
        $partner_leads = CandidateLogin::latest()
        ->where('recruiter', 0)
        ->orderBy('id', 'ASC')
        ->get();
        return view('admin.assign_website',compact('recruiter','partner_leads'));
    }// End Method

    public function AssignWebsite(Request $request)
    {
       
        

        $i=0;
        $files = $request->input('files');
        $ustatus = $request->input('recqruter');

        foreach ($files as $file) {
            $evaluation = CandidateLogin::where('id', $file)->first();
            $partnerCode = $evaluation->vasper_code;

            $addPartner = CandidateLogin::where('vasper_code', $partnerCode)->first();
            $pEmail = $addPartner->email;
            $pName = $addPartner->name;

            $nestUser = Recruiter::where('id', $ustatus)->first();
            $cName = $nestUser->name;
            $cMail = $nestUser->email;

            $evaluation->update(['recruiter' => $ustatus]);

            
            $i++;
        }

        // Additional logic or response if needed
        return redirect()->route('assign.website');   
    }// End Method

    public function JobDocument()
    {
       
          // Fetch all project names
    $project_name = Project::all();

    // Fetch distinct job titles and countries based on project_id
    $job_title = Jobs::select('title')
        ->distinct()
        ->orderBy('title', 'ASC')
        ->get();

    $job_country = Jobs::select('country')
        ->distinct()
        ->orderBy('country', 'ASC')
        ->get();

    // Pass the data to the view
        return view('admin.create_jobs.jobs_documents',compact('job_title','job_country','project_name'));  
    }// End Methods

    public function getJobsByProject(Request $request)
{
    $project_id = $request->input('project_id');
    
    $job_titles = Jobs::select('title')
        ->where('project_id', $project_id)
        ->distinct()
        ->orderBy('title', 'ASC')
        ->get();

    $job_countries = Jobs::select('country')
        ->where('project_id', $project_id)
        ->distinct()
        ->orderBy('country', 'ASC')
        ->get();
  
    return response()->json([
        'job_titles' => $job_titles,
        'job_countries' => $job_countries,
    ]);
}// End Methods


public function StoreJobsDocuments(Request $request)
{
    $jobId = $request->job_id; 
    $jobTitle = $request->job_title;
    $country = $request->country;
    $project_id = $request->project_id; // Capture project_id

    $documentNames = $request->document_name;
    $jobStages = $request->job_stage;

    $maxCount = max(count($documentNames), count($jobStages));

    for ($index = 0; $index < $maxCount; $index++) {
        $documentName = isset($documentNames[$index]) ? $documentNames[$index] : null;
        $jobStage = isset($jobStages[$index]) ? $jobStages[$index] : null;

        JobDocuments::create([
            'job_id' => $jobId,
            'lead_id' => $request->lead_id,
            'user_id' => $request->user_id,
            'project_id' => $project_id, // Ensure this is passed
            'job_title' => $jobTitle,
            'country' => $country,
            'document_name' => $documentName,
            'job_stage' => $jobStage,
            'created_at' => now(),
        ]);
    }

    return redirect()->route('job.documentlist')->with('success', 'Documents have been added successfully.');
}



    public function JobDocumentList()
    {
       
        $job_title = Lead::select('job_title')->distinct()->orderBy('job_title', 'ASC')->get();
        $job_country = Lead::select('desiged_country')->distinct()->orderBy('desiged_country', 'ASC')->get();
        $job_document = JobDocuments::select(
            'job_title',
            'country',
            DB::raw('GROUP_CONCAT(document_name ORDER BY document_name) as documents'),
            DB::raw('GROUP_CONCAT(job_stage ORDER BY job_stage) as stages')  // Concatenate job stages similarly
        )
        ->groupBy('job_title', 'country')
        ->orderBy('id', 'ASC')
        ->get();
        return view('admin.create_jobs.jobs_documentslist',compact('job_title','job_country','job_document'));  
    }// End Methods

    public function editJobDocuments($job_title, $country)
{
    // All project data
    $project_name = Project::all();

    // Dropdown data
    $job_titles = Lead::select('job_title')->distinct()->orderBy('job_title')->get();
    $job_countries = Lead::select('desiged_country')->distinct()->orderBy('desiged_country')->get();

    // Get all job documents for display and editing
    $job_documents = JobDocuments::where('job_title', $job_title)
        ->where('country', $country)
        ->get();

    // Get pre-selected values from the first document
    $first_document = $job_documents->first();

    $selected_project_id = optional($first_document)->project_id;
    $selected_job_title = trim(optional($first_document)->job_title);
    $selected_country = trim(optional($first_document)->country);

    return view('admin.create_jobs.edit_job_documents', compact(
        'job_documents',
        'job_titles',
        'job_countries',
        'project_name',
        'selected_project_id',
        'selected_job_title',
        'selected_country'
    ));
} // End Methods 

public function UpdateJobsDocuments(Request $request)
{
    $jobId      = $request->job_id;
    $jobTitle   = $request->job_title;
    $country    = $request->country;
    $leadId     = $request->lead_id;
    $userId     = $request->user_id;
    $projectId  = $request->project_id;

    $submittedIds = [];

    $docNames  = $request->document_name ?? [];
    $stages    = $request->job_stage ?? [];
    $docIds    = $request->document_id ?? [];

    foreach ($docNames as $index => $docName) {
        $stage = $stages[$index] ?? null;
        $docId = $docIds[$index] ?? null;

        // Check if this row has any meaningful data
        if (!empty($docName) || !empty($stage)) {
            if (!empty($docId)) {
                $document = JobDocuments::find($docId);
                if ($document) {
                    $document->document_name = $docName;
                    $document->job_stage     = $stage;
                    $document->job_id        = $jobId;
                    $document->project_id    = $projectId;
                    $document->job_title     = $jobTitle;
                    $document->country       = $country;
                    $document->save();

                    $submittedIds[] = $docId;
                }
            } else {
                $new = JobDocuments::create([
                    'document_name' => $docName,
                    'job_stage'     => $stage,
                    'job_id'        => $jobId,
                    'project_id'    => $projectId,
                    'job_title'     => $jobTitle,
                    'country'       => $country,
                    'lead_id'       => $leadId,
                    'user_id'       => $userId,
                    'created_at'    => now(),
                ]);
                $submittedIds[] = $new->id;
            }
        }
    }

    // Delete any documents not submitted this time
    JobDocuments::where('job_id', $jobId)
        ->where('job_title', $jobTitle)
        ->where('country', $country)
        ->whereNotIn('id', $submittedIds)
        ->delete();

    return redirect()->route('job.documentlist')
        ->with('success', 'Job Documents updated successfully.');
}




public function deleteJobDocuments($job_title, $country)
{
    // Fetch and delete all documents that match the given job_title and country
    JobDocuments::where('job_title', $job_title)
                ->where('country', $country)
                ->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'All documents for the selected Job Title and Country have been deleted.');
}// End methods

// YourController.php
public function deleteJobDocument($id)
{
    // Find the document by ID and delete it
    $document = JobDocuments::find($id);
    if ($document) {
        $document->delete();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Document not found.']);
    }
}// End Methods

public function deleteDocument($id)
{
    $doc = JobDocuments::find($id);

    if ($doc) {
        $doc->delete();
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Document not found']);
}


public function deleteStage($id)
{
     $stage = JobDocuments::find($id);

    if ($stage) {
        $stage->delete();
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Stage not found']);
}// End Methods






}


    

    