<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminJobController;
use App\Http\Controllers\AdminJobLocationController;
use App\Http\Controllers\AdminJobTypeController;
use App\Http\Controllers\AdminJobExperienceController;
use App\Http\Controllers\AdminJobGenderController;
use App\Http\Controllers\AdminJobSalaryController;
use App\Http\Controllers\AdminJobCreateController;
use App\Http\Controllers\AdminVerticalsController;
use App\Http\Controllers\AdminQuickController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Recruiter\RecruiterAuthController;
use App\Http\Controllers\Recruiter\RecruiterDashboardController;

use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\JobListController;
use App\Http\Controllers\Admin\LeadAssignController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Admin\EmployerContractController;
use App\Http\Controllers\Admin\RecruiterCommissionRuleController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'About'])->name('about');

Route::get('/employer-zone', [HomeController::class, 'EmployerZone'])->name('employer');
Route::get('/sign-up', [HomeController::class, 'Signup'])->name('signup');
Route::get('/contact', [HomeController::class, 'Contact'])->name('contact');
Route::get('/policy', [HomeController::class, 'Policy'])->name('policy');
Route::get('/policyrefund', [HomeController::class, 'RefundPolicy'])->name('refundpolicy');
Route::get('/terms-and-conditions', [HomeController::class, 'Termas'])->name('termas');

Route::get('/team', [HomeController::class, 'Team'])->name('team');

Route::post('store/employzone/', [HomeController::class, 'StoreEmploye'])->name('store.employe');
Route::post('store/contactus/', [HomeController::class, 'StoreContact'])->name('store.contactus');
// Download Brochure Route
Route::get('/download-brochure', [HomeController::class, 'DownloadBrochure'])->name('dowload.brochure');



// Video Route

Route::get('/video', [HomeController::class, 'Video'])->name('video');

Route::get('/video/category/{category}', [HomeController::class, 'showByCategory'])->name('video.category');

// Fronten Home Job Search
Route::get('job-listing', [JobListController::class, 'index'])->name('job_listing');
Route::get('job/details/{id}', [JobListController::class, 'JobDetails'])->name('job_detail');


// Careers All Routes

Route::get('careers', [JobListController::class, 'Careers'])->name('careers');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(AdminController::class)->group(function (){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','Profile')->name('admin.profile');
    Route::get('/edit/profile','EditProfile')->name('edit.profile');
    Route::post('/update/profile','UpdateProfile')->name('update.profile'); 
    Route::get('/agreement/list','AgreementList')->name('agreement.list');
    
    Route::get('/invoice/add','InvoiceAdd')->name('invoices.add');
     Route::post('/invoice/store','StoreInvoiceSave')->name('invoice.save');
     Route::get('/admin/invoice/pdf/{invoice}','downloadInvoice')->name('admin.invoice.pdf');
     
      Route::get('/invoice/list','InvoiceList')->name('invoices.list');
    
        });
    Route::controller(RecruiterController::class)->group(function (){
    Route::get('/admin/recruiter/all','AllRecruiter')->name('all.recruiter');
     Route::get('admin/add/recruiter','AddRecruiter')->name('add.recruiter');
     Route::post('/store/recruiter','StoreRecruiter')->name('store.recruiter');
     Route::get('/edit/recruiter/{id}','EditRecruiter')->name('edit.recruiter');
    Route::post('/update/recruiter/{id}','UpdateRecruiter')->name('update.recruiter');
    Route::get('/delete/recruiter/{id}','DeleteRecruiter')->name('delete.recruiter');
    Route::get('/change/recruiter/status/{id}','ChangeRecruiterStatus')->name('change.recruiter.status');


       });

        Route::controller(EmployerController::class)->group(function (){
    Route::get('/admin/employer/all','AllEmployer')->name('all.employer');
     Route::get('admin/add/employer','AddEmployer')->name('add.employer');
     Route::post('/store/employer','StoreEmployer')->name('store.employer');
     Route::get('/edit/employer/{id}','EditEmployer')->name('edit.employer');
    Route::post('/update/employer/{id}','UpdateEmployer')->name('update.employer');
    Route::get('/delete/employer/{id}','DeleteEmployer')->name('delete.employer');
    Route::get('/change/employer/status/{id}','ChangeEmployerStatus')->name('change.employer.status');


       });
 Route::controller(EmployerController::class)->group(function (){
    Route::get('/admin/employer/all','AllEmployer')->name('all.employer');
     Route::get('admin/add/employer','AddEmployer')->name('add.employer');
     Route::post('/store/employer','StoreEmployer')->name('store.employer');
     Route::get('/edit/employer/{id}','EditEmployer')->name('edit.employer');
    Route::post('/update/employer/{id}','UpdateEmployer')->name('update.employer');
    Route::get('/delete/employer/{id}','DeleteEmployer')->name('delete.employer');
    Route::get('/change/employer/status/{id}','ChangeEmployerStatus')->name('change.employer.status');


       });
 Route::controller(EmployeeController::class)->group(function (){
    Route::get('/admin/employee/all','AllEmployee')->name('all.employee');
     Route::get('admin/add/employee','AddEmployee')->name('add.employee');
     Route::post('/store/employee','StoreEmployee')->name('store.employee');
     Route::get('/edit/employee/{id}','EditEmployee')->name('edit.employee');
    Route::post('/update/employee/{id}','UpdateEmployee')->name('update.employee');
    Route::get('/delete/employee/{id}','DeleteEmployee')->name('delete.employee');
    Route::get('/change/employee/status/{id}','ChangeEmployeeStatus')->name('change.employee.status');

       });
// Admin Project Routes
        Route::controller(ProjectController::class)->group(function (){
       Route::get('/admin/project/all','AllProject')->name('all.project');
       Route::get('admin/add/project','AddProject')->name('add.project');
       Route::post('/store/project','StoreProject')->name('store.project');
       Route::get('/edit/project/{id}','EditProject')->name('edit.project');
      Route::post('/update/project/{id}','UpdateProject')->name('update.project');
    Route::get('/delete/project/{id}','DeleteProject')->name('delete.project');
    Route::get('/change/project/status/{id}','ChangeProjectStatus')->name('change.project.status');

   


       });

       Route::controller(AdminJobController::class)->group(function (){
    Route::get('/admin/job','AllJob')->name('all.job');
    Route::get('/admin/AddJob','AddJob')->name('job.add');
    Route::post('/store/job/categories','StoreJob')->name('store.job');
    Route::get('/edit/job/{id}','EditJob')->name('eidt.job');
    Route::post('/update/job/categories','UpdateJob')->name('update.job');
    Route::get('/delete/job/{id}','DeleteJob')->name('delete.job');
    
});

Route::controller(AdminJobLocationController::class)->group(function (){
    Route::get('/admin/job/location','AllJobLocation')->name('all.job_location');
    Route::get('/admin/Job/location/Add','JobLocation')->name('job_location.add');
    Route::post('/store/job/location','StoreJobLocation')->name('store.job_location');
    Route::get('/edit/job/location/{id}','EditJobLocation')->name('eidt.job_location');
    Route::post('/update/job/location','UpdateJobLocation')->name('update.job_location');
    Route::get('/delete/job/location/{id}','DeleteJobLocation')->name('delete.job_location');
   
});

Route::controller(AdminJobTypeController::class)->group(function (){
    Route::get('/admin/job/type','AllJobType')->name('all.types_job');
    Route::get('/admin/job/type/Add','JobType')->name('job_type.add');
    Route::post('/store/job/type','StoreJobType')->name('store.job_type');
    Route::get('/edit/job/type/{id}','EditJobType')->name('eidt.job_type');
    Route::post('/update/job/type','UpdateJobType')->name('update.job_type');
    Route::get('/delete/job/type/{id}','DeleteJobType')->name('delete.job_type');
   
});

Route::controller(AdminJobExperienceController::class)->group(function (){
    Route::get('/admin/job/experience','AllJobExperience')->name('all.job_experience');
    Route::get('/admin/job/experience/Add','JobExperienceAdd')->name('job_exp.add');
    Route::post('/store/job/experience','StoreJobExperience')->name('store.job_experience');
    Route::get('/edit/job/experience/{id}','EditJobExperience')->name('eidt.job_exp');
    Route::post('/update/job/experience','UpdateJobExperience')->name('update.job_experience');
    Route::get('/delete/job/experience/{id}','DeleteJobExperience')->name('delete.job_exp');
    
});

Route::controller(AdminJobGenderController::class)->group(function (){
    Route::get('/admin/job/gender','AllJobGender')->name('all.job_gender');
    Route::get('/admin/job/gender/Add','JobGenderAdd')->name('job_gender.add');
    Route::post('/store/job/gender','StoreJobGender')->name('store.job_gender');
    Route::get('/edit/job/gender/{id}','EditJobGender')->name('eidt.job_gender');
    Route::post('/update/job/gender','UpdateJobGender')->name('update.job_gender');
    Route::get('/delete/job/gender/{id}','DeleteJobGender')->name('delete.job_gender');
    
});

Route::controller(AdminJobSalaryController::class)->group(function (){
    Route::get('/admin/job/salary','AllJobSalary')->name('all.job_salary');
    Route::get('/admin/job/salary/Add','JobSalaryAdd')->name('job_salary.add');
    Route::post('/store/job/salary','StoreJobSalary')->name('store.job_salary');
    Route::get('/edit/job/salary/{id}','EditJobSalary')->name('eidt.job_salary');
    Route::post('/update/job/salary','UpdateJobSalary')->name('update.job_salary');
    Route::get('/delete/job/salary/{id}','DeleteJobSalary')->name('delete.job_salary');
    
    
});

Route::controller(AdminJobCreateController::class)->group(function (){
    Route::get('/admin/job/create','AddnewJobs')->name('add.new_jobs');
    Route::post('/store/New/Job','StoreNewJobs')->name('store.new_job');
    Route::get('/admin/All/NewJobs','AllNewJobs')->name('all.new_jobs');
    Route::get('/Edit/Jobs/Status/{id}','UpdateJobStatus')->name('eidt.job_status');
    Route::get('/Edit/New/jobs/{id}','EditNewJobs')->name('eidt.new_jobs');
    Route::post('/update/New/Job','UpdateNewJobs')->name('update.new_job');
    Route::get('/delete/New/jobs/{id}','DeleteNewJobs')->name('delete.new_jobs');

});

Route::controller(AdminVerticalsController::class)->group(function (){
    Route::get('/admin/verticals','AllVerticals')->name('all.verticals');
    Route::get('/admin/verticals/Add','VerticalsAdd')->name('add.verticals');
    Route::post('/store/verticals','StoreVerticals')->name('store.verticals');
    Route::get('/edit/verticals/{id}','EditVerticals')->name('eidt.verticals');
    Route::post('/update/verticals','UpdateVerticals')->name('update.verticals');
    Route::get('/delete/verticals/{id}','DeleteVerticals')->name('delete.verticals');
    
    Route::get('/verticals_detail/{id}','VerticalsDetails')->name('verticals_detail');

    Route::post('/store/projectrequirement','StoreProjectRequirement')->name('store.project_requirements');

// Video URL All Route
    Route::get('/admin/videoGallery','AllVideoGallery')->name('all.videoGallery');
    Route::get('/admin/videourl/Add','VideoURLAdd')->name('add.videoGallery');
    Route::post('/store/videourl','StoreVideoURL')->name('store.videourl');
    Route::get('/edit/videourl/{id}','EditVideoURL')->name('eidt.videourl');
    Route::post('/update/videourl','UpdateVideoURl')->name('update.videourl');
    Route::get('/delete/videourl/{id}','DeleteVideoUrl')->name('delete.videoURL');
});
       Route::controller(AdminQuickController::class)->group(function (){
    Route::get('/admin/quick','AllQuick')->name('all.quick');
    Route::get('/admin/quick/add','AddQuick')->name('add.quick');
    Route::post('/store/quick','StoreQuick')->name('store.quick');
    Route::get('/edit/quick/{id}','EditQuick')->name('eidt.quick');
    Route::post('/update/quick','UpdateQuick')->name('update.quick');
    Route::get('/delete/quick/{id}','DeleteQuick')->name('delete.quick');

    /* Fromt Quick Route */
   
    Route::get('/carrer-details/{id}','CarrerDetails')->name('carrer.details');
});
       // Admin Position Routes
        Route::controller(PositionController::class)->group(function (){
       Route::get('/admin/position/all','AllPosition')->name('all.position');
       Route::get('admin/add/position','AddPosition')->name('add.position');
       Route::post('/store/position','StorePosition')->name('store.position');
       Route::get('/edit/position/{id}','EditPosition')->name('edit.position');
      Route::post('/update/position/{id}','UpdatePosition')->name('update.position');
    Route::get('/delete/position/{id}','DeletePosition')->name('delete.position');
    Route::get('/change/position/status/{id}','ChangePositionStatus')->name('change.position.status');

    

       });

       // Admin Vacancy Routes
        Route::controller(VacancyController::class)->group(function (){
       Route::get('/admin/vacancy/all','AllVacancy')->name('all.vacancy');
       Route::get('admin/add/vacancy','AddVacancy')->name('add.vacancy');
       Route::post('/store/vacancy','StoreVacancy')->name('store.vacancy');
       Route::get('/edit/vacancy/{id}','EditVacancy')->name('edit.vacancy');
      Route::post('/update/vacancy/{id}','UpdateVacancy')->name('update.vacancy');
    Route::get('/delete/vacancy/{id}','DeleteVacancy')->name('delete.vacancy');
    Route::get('/change/vacancy/status/{id}','ChangeVacancyStatus')->name('change.vacancy.status');

       });

       // Admin Employer Contract Routes
        Route::controller(EmployerContractController::class)->group(function (){
       Route::get('/admin/employer/contract/all','AllEmployerContracts')->name('all.employer.contract');
       Route::get('admin/add/employer/contract','AddEmployerContract')->name('add.employer.contract');
       Route::post('/store/employer/contract','StoreEmployerContract')->name('store.employer.contract');
       Route::get('/edit/employer/contract/{id}','EditEmployerContract')->name('edit.employer.contract');
      Route::post('/update/employer/contract/{id}','UpdateEmployerContract')->name('update.employer.contract');
    Route::get('/delete/employer/contract/{id}','DeleteEmployerContract')->name('delete.employer.contract');
   

       });

       // Admin Recruiter Commission Rule Routes
        Route::controller(RecruiterCommissionRuleController::class)->group(function (){
       Route::get('/admin/recruiter/commission/rule/all','AllRecruiterCommissionRules')->name('all.recruiter.commission.rules');
       Route::get('admin/add/recruiter/commission/rule','AddRecruiterCommissionRule')->name('add.recruiter.commission.rule');
       Route::post('/store/recruiter/commission/rule','StoreRecruiterCommissionRule')->name('store.recruiter.commission.rule');
       Route::get('/edit/recruiter/commission/rule/{id}','EditRecruiterCommissionRule')->name('edit.recruiter.commission.rule');
      Route::post('/update/recruiter/commission/rule/{id}','UpdateRecruiterCommissionRule')->name('update.recruiter.commission.rule');
    Route::get('/delete/recruiter/commission/rule/{id}','DeleteRecruiterCommissionRule')->name('delete.recruiter.commission.rule');

       });
       // Admin Lead Assign Routes
    Route::controller(LeadAssignController::class)->group(function (){
    Route::get('/admin/lead/assign','LeadAssign')->name('lead.assign');
    Route::post('/upload/social/media/leads','ImportSocialMedia')->name('upload.social.leads');
     Route::post('/assign/social/media/leads','AssignSocialMediaLeads')->name('social.assign.store');

      Route::get('/employer/lead/assign','AssignEmployerLeads')->name('lead.employer');
   
});


Route::controller(BlogController::class)->group(function (){
    Route::get('/admin/blog','AddBlog')->name('blog.add');
    Route::post('/store/blog','StoreBlog')->name('store.blog');
    Route::get('/all/blog','AllBlog')->name('all.blog');
    Route::get('/edit/blog/{id}','EditBlog')->name('eidt.blog');
    Route::post('/update/blog','UpdateBlog')->name('update.blog');
    Route::get('/delete/blog/{id}','DeleteBlog')->name('delete.blog');
    /* Fromt Blob Route */
    Route::get('/blog','FrontBlog')->name('list_blog');
    Route::get('/blog_Details/{id}','BlogDetails')->name('blog_detail');
});
    

       Route::get('/recruiter/login', [RecruiterAuthController::class, 'showLoginForm'])
    ->name('recruiter.login');

Route::post('/recruiter/login', [RecruiterAuthController::class, 'login'])
    ->name('recruiter.login.submit');

// All routes that require recruiter authentication
   
    Route::middleware('recruiter:recruiter')->group(function () {
    Route::get('/recruiter/dashboard', [RecruiterDashboardController::class, 'index'])->name('recruiter.dashboard');
    Route::get('/recruiter/logout', [RecruiterDashboardController::class, 'RecruiterLogout'])->name('recruiter.logout');
    Route::get('/recruiter/leads',  [RecruiterDashboardController::class, 'RecruiterLeads'])->name('recruiter.leads');
    Route::get('/recruiter/leads/assign',  [RecruiterDashboardController::class, 'AssignLeads'])->name('recruiter.leads.assign');
    Route::get('/recruiter/add/{id}/leads',  [RecruiterDashboardController::class, 'RecruiterAddCandidates'])->name('recruiter.add.candidates');
    Route::post('/recruiter/store/leads',  [RecruiterDashboardController::class, 'RecruiterStoreLeads'])->name('recruiter.leads.store');
Route::get('/recruiter/full-details/{lead_id}/leads',[RecruiterDashboardController::class, 'leadFullDetailPage'])->name('recruiter.lead.fulldetails');
Route::get('social-leads/{id}/action',[RecruiterDashboardController::class, 'Action'])->name('recruiter.social-leads.action');
Route::post('social-leads/store',  [RecruiterDashboardController::class, 'Store'])->name('recruiter.social-leads.store');

 Route::get('leads/{lead}', [RecruiterDashboardController::class, 'show'])->name('recruiter.leads.show');

 Route::get('/recruiter/all/leads',  [RecruiterDashboardController::class, 'RecruiterAllLeads'])->name('recruiter_all.leads');
 Route::get('/recruiter/interested/leads',  [RecruiterDashboardController::class, 'RecruiterInterestedLeads'])->name('recruiter_interested.leads');
// Route::post('leads/{lead}/map', [RecruiterDashboardController::class, 'mapToVacancy']) ->name('recruiter.leads.map');

Route::post('leads/{lead}/map-to-vacancy',[RecruiterDashboardController::class, 'mapToVacancy'] )->name('leads.mapToVacancy');
// AJAX: Employer → Projects
Route::get(
    'employer/{employer}/projects',[RecruiterDashboardController::class, 'getEmployerProjects'])->name('ajax.employer.projects');

// AJAX: Project → Vacancies
Route::get('project/{project}/vacancies',[RecruiterDashboardController::class, 'getProjectVacancies'])->name('ajax.project.vacancies');

Route::post('employees/store', [RecruiterDashboardController::class, 'storeEmployee'])
    ->name('employees.store');

Route::post('employees/{employee}/compliance',[RecruiterDashboardController::class, 'storeEmployeeCompliance'])->name('employees.compliance.store');

Route::post('/deployment/{employee}', [RecruiterDashboardController::class, 'storeDeployment'])
    ->name('deployment.store');

Route::post('/timesheet/{employee}', [RecruiterDashboardController::class, 'storeOrUpdate'])->name('timesheet.store');

Route::post('/recruiter/invoice/store', [RecruiterDashboardController::class, 'StoreOrUpdateInvoice'])->name('recruiter.invoice.store');


Route::post('/leads/update/{lead}', [RecruiterDashboardController::class, 'UpdateLeadOverview'])
     ->name('leadsoverview.update');




        
    
});



