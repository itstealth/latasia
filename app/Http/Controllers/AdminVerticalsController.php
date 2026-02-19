<?php

namespace App\Http\Controllers;

use App\Models\Verticals;
use App\Models\VideoGallery;
use App\Models\ProjectRequirement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectRequirementMail;

class AdminVerticalsController extends Controller
{
    public function AllVerticals()
    {
        $verticals_all = Verticals::orderBy('id', 'ASC')->get();
        return view('admin.verticals.all_verticals', compact('verticals_all'));
    } // End Method

    public function VerticalsAdd()
    {
        return view('admin.verticals.add_verticals');
    } // End Method

    public function StoreVerticals(Request $request)
    {
        $image = $request->file('verticals_image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        $save_url = 'upload/verticals/' . $name_gen;

        // Move the uploaded file to the specified folder
        $image->move(public_path('upload/verticals'), $name_gen);
        Verticals::insert([

            'title' => $request->title,
            'verticals_image' => $save_url,
            'description' => $request->description,
            'long_description' => $request->long_description,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('all.verticals');
    } // End Method
    public function EditVerticals($id)
    {
        $edit_vertics = Verticals::findOrFail($id);
        return view('admin.verticals.edit_verticals', compact('edit_vertics'));
    } // End Method
    public function UpdateVerticals(Request $request)
    {
        $vertic = $request->id;
        if ($request->file('verticals_image')) {
            $image = $request->file('verticals_image');

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'upload/verticals/' . $name_gen;
            // Move the uploaded file to the specified folder
            $image->move(public_path('upload/verticals'), $name_gen);

            Verticals::findOrFail($vertic)->update([
                'title' => $request->title,
                'verticals_image' => $save_url,
                'description' => $request->description,
                'long_description' => $request->long_description,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Updated With Images Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.verticals')->with($notification);
        } else {
            Verticals::findOrFail($vertic)->update([
                'title' => $request->title,
                'description' => $request->description,
                'long_description' => $request->long_description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Updated Without Images Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.verticals')->with($notification);
        }
    } // End Method
    public function DeleteVerticals($id)
    {
        Verticals::where('id', $id)->delete();
        return redirect()->route('all.verticals');
    } //End Method

    public function VerticalsDetails($id)
    {
        

        $verticals_details = Verticals::where('id', $id)->first();

    // Fetch videos related to this vertical
    $videos = VideoGallery::where('verticals_id', $id)->get();

    return view('frontend.home_all.verticals_detils', compact('verticals_details', 'videos'));
    } // End Method

    public function AllVideoGallery()
    {
        $videogallery_all = VideoGallery::orderBy('id', 'ASC')->get();
        return view('admin.video.all_video', compact('videogallery_all'));

    } // End Method

    public function VideoURLAdd()
    {
        $vartics =Verticals::OrderBy('title','ASC')->get();
        return view('admin.video.add_video',compact('vartics'));
    } // End Method

    public function StoreVideoURL(Request $request)
    {
       // Create and save the new video entry
    $video = new VideoGallery();
    $video->title = $request->title;
    $video->videocategory = $request->videocategory;
    $video->description = $request->description;
    $video->video_url = $request->video_url;
   
    $video->created_at = Carbon::now(); // Insert current time & date
    $video->save();

    // Redirect back with success message
    return redirect()->route('all.videoGallery');
    } // End Methods

    public function EditVideoURL($id)
    {
        $edit_videourl = VideoGallery::findOrFail($id);
        $vartics =Verticals::OrderBy('title','ASC')->get();
        return view('admin.video.edit_videourl', compact('edit_videourl','vartics'));
    } // End Method

    public function UpdateVideoURl(Request $request)
    {
        $video_id = $request->id;

        VideoGallery::findOrfail($video_id)->update([

            'title' => $request->title,
            'videocategory' => $request->videocategory,
            'description' => $request->description,
            'video_url' => $request->video_url,
            'verticals_id' => $request->verticals_id,
            'updated_at' => Carbon::now(),

        ]);
        return redirect()->route('all.videoGallery');
    } // End Methods

    public function DeleteVideoUrl($id)
    {
        $portfolio = VideoGallery::findorFail($id);

        VideoGallery::findorFail($id)->delete();

       
        return redirect()->back();
    } // End Method

    public function StoreProjectRequirement(Request $request)
{
    $data = new ProjectRequirement();
    $data->company_name     = $request->company_name;
    $data->contact_person   = $request->contact_person;
    $data->email            = $request->email;
    $data->phone            = $request->phone;
    $data->project_type     = $request->project_type;
    $data->roles_needed     = json_encode($request->roles_needed);
    $data->project_location = $request->project_location;
    $data->start_date       = $request->start_date;
    $data->details          = $request->details;

    // Upload file
    if ($request->file('upload_file')) {
        if (!File::exists(public_path('upload/project_requirements'))) {
            File::makeDirectory(public_path('upload/project_requirements'), 0755, true);
        }

        $file     = $request->file('upload_file');
        $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
        $save_url = 'upload/project_requirements/' . $name_gen;
        $file->move(public_path('upload/project_requirements/'), $name_gen);

        $data->upload_file = $save_url;
    }

    $data->created_at = Carbon::now(); // Insert current time & date
    $data->save();

    // Send Email to admin
    Mail::to('zuber@vasperglobal.com')->send(new ProjectRequirementMail($data));

    return redirect()->back()->with('success', 'Project Requirement submitted successfully!');
}// End Methods

}
