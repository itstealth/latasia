<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\SignUp;
use App\Models\Country;
use App\Models\Jobs;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
class SignupController extends Controller
{
  public function SiginUp($job)
  {
    $job_single = Jobs::findOrFail($job);
    $country =Country::OrderBy('id','ASC')->get();
    return view('frontend.signup',compact('job_single','country'));
  }
  public function CandidateSignup(Request $request,$job)
  {
    $validator = Validator::make($request->all(), [
      'g-recaptcha-response' => 'required', // Assuming this is the field for reCAPTCHA response
      // Add other form field validations here
  ]);
  
  if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
  }
      if ($request->hasFile('photo')) {
          $image = $request->file('photo');
          $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
          $save_url = 'upload/Document/' . $name_gen;
          // Move the uploaded file to the specified folder
          $image->move(public_path('upload/Document'), $name_gen);
      } else {
          // Handle the case when no photo is uploaded
          $save_url = null; // or provide a default value or handle it according to your application logic
      }
  
      SignUp::insert([
            'job_id' => $job,
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'photo' => $save_url,
          'password' => Hash::make($request->password),
          
          'created_at' => Carbon::now(),
      ]);
  
      $notification = array(
          'message' => 'Successfully  Apply The Job',
          'alert-type' => 'success'
      );
  
      
      return redirect()->route('home')->with($notification);
  }// End Method
  
}
