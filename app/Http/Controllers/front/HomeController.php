<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\EmployerZone;
use App\Models\ContactUs;
use App\Models\JobCategories;
use App\Models\JobLocation;
use App\Models\VideoGallery;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $job_location = JobLocation::orderBy('name', 'ASC')->get();

    $recentJobs = Jobs::whereIn('id', function ($query) {
        $query->select(DB::raw('MAX(id)'))
              ->from('ljobs')
              ->groupBy('title');
    })
    ->latest()
    ->take(3)
    ->get();

    $featured = Jobs::where('is_featured', 1)->take(3)->get();
    $fulltime = Jobs::where('job_type_id', 1)->take(3)->get();
    $jobs = Jobs::all();

    // Add your actual query here for jobCategories2
    $jobCategories2 = JobCategories::withCount('rjob')->get();

    $categories = ['Welder', 'Construction', 'Transportation'];
    $videoGallery = collect();

    // ✅ Safe check: only query if the table exists
    if (Schema::hasTable('video_galleries')) {
    foreach ($categories as $category) {
        $videos = VideoGallery::where('videocategory', $category)
            ->latest()
            ->take(3)
            ->get();
        $videoGallery[$category] = $videos;
    }
}

    $showAdvertisement = $request->session()->get('show_advertisement', false);

// Step 1: Get summed vacancies by job_category_id
$jobCategories = Jobs::select('job_category_id', \DB::raw('SUM(vacancy) as totalVacancy'))
    ->whereNotNull('job_category_id') // Make sure it's not null
    ->groupBy('job_category_id')
    ->limit(3)
    ->get();

// Step 2: Fetch related categories
$categoryIds = $jobCategories->pluck('job_category_id')->toArray();

$categories = JobCategories::whereIn('id', $categoryIds)
    ->select('id', 'name', 'icon')
    ->get()
    ->keyBy('id'); // So we can access like $categories[18]

// Step 3: Attach category data to each item
$jobCategories->transform(function ($item) use ($categories) {
    $item->rcategory = $categories[$item->job_category_id] ?? null;
    return $item;
});





    $categori = JobCategories::orderBy('name', 'ASC')->take(4)->get();

  return view('home.home', compact(
    'jobCategories',
    'categori', // your other variables
    'job_location',
    'recentJobs',
    'featured',
    'fulltime',
    'jobs',
    'showAdvertisement',
    'videoGallery',
    'jobCategories2'
    ));
}

    public function About()
    {
       // Retrieve visit count grouped by country and city
    $visits = DB::table('page_visits')
    ->where('page_name', 'about')
    ->select(DB::raw('sum(visit_count) as visit_count, country, city'))
    ->groupBy('country', 'city')
    ->get();

// Pass the visit data to the view
return view('frontend.about', compact('visits'));
    }// End Method

    public function EmployerZone()
    {
        return view('frontend.employe');
    }// End Method
    public function Contact()
    {
        return view('frontend.contact');
    }// End Method
    public function Signup()
    {
        return view('frontend.signup');
    }// End Method
    public function Policy()
    {
        return view('frontend.policy');
    }// End Method
    public function RefundPolicy()
    {
        return view('frontend.refundpolicy');
    }// End Method

    public function HomePage()
    {
        return view('home.home'); 
    }

    public function DownloadBrochure()
    {
        return view('Home.body.header');
    }// End Method

    public function StoreEmploye(Request $request)
    {
        $timezone = 'Asia/Kolkata';

        EmployerZone::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'position' => $request->position,
            'description' => $request->description,
            'created_at' => Carbon::now($timezone),
        ]);
    
        // Flash a success message to the session
        return redirect()->route('employer')->with('success', 'Employee successfully added!');
    }//End Method

    public function StoreContact(Request $request)
    {
        $timezone = 'Asia/Kolkata';

        ContactUs::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'description' => $request->description,
            
            'created_at' => Carbon::now($timezone),
        ]);
    
        // Flash a success message to the session
        return redirect()->route('employer')->with('success', 'Contact successfully added!');
    }//End Method

    public function Video()
    {
        return view('frontend.video'); 
    }// End Methods

    public function showByCategory($category)
{
    $category = str_replace('-', ' ', $category);

    // Case insensitive category match
    $videos = VideoGallery::where(DB::raw('LOWER(videocategory)'), strtolower($category))->get();

    return view('frontend.video', compact('videos', 'category'));
}// End Method

public function Termas()
    {
        return view('frontend.termas');
    }// End Method
    
    public function Team()
    {
        return view('frontend.team');
    }// End Method

}
