<?php

namespace App\Http\Controllers;
use App\Models\Recruiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class RecruiterController extends Controller
{
    

    public function AllRecruiter()
    {
       $recruiters = Recruiter::latest()->get();
        return view('admin.recruiter.all_recruiter',compact('recruiters'));

    } // End Methods

    public function AddRecruiter()
    {
        return view('admin.recruiter.recruiter_add');
    } // End Method

    public function StoreRecruiter(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:recruiters,email',
            'phone'    => 'required|unique:recruiters,phone',
            'password' => 'required|min:6',
        ]);
      $lastRecruiter = Recruiter::latest('id')->first();
       $nextNumber = $lastRecruiter ? $lastRecruiter->id + 1 : 1;

    // Generate LATASIA Recruiter Code
    $recruiterCode = 'LATASIA-REC-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        Recruiter::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'password'       => Hash::make($request->password),

            'address'        => $request->address,
            
            'recruiter_code' => $recruiterCode,
            'status'         => 1,
            'created_at'    => Carbon::now('Asia/Kolkata'),
            'updated_at'    => Carbon::now('Asia/Kolkata'),
        ]);

        return redirect()->back()->with('success', 'Recruiter created successfully');
    }



    public function EditRecruiter($id)
    {
        $recruiter = Recruiter::findOrFail($id);
        return view('admin.recruiter.recruiter_edit', compact('recruiter'));
    } // End Method

   public function UpdateRecruiter(Request $request, $id)
{
    
    $recruiter = Recruiter::findOrFail($id);

    $recruiter->update([
        'name'    => $request->name,
        'email'   => $request->email,
        'phone'   => $request->phone,
        'address' => $request->address,
    ]);

    return redirect()
        ->route('all.recruiter')
        ->with('success', 'Recruiter updated successfully');
}

    public function DeleteRecruiter($id)
    {
        Recruiter::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Recruiter deleted successfully');
    } // End Method

    public function ChangeRecruiterStatus($id)
    {
        $recruiter = Recruiter::findOrFail($id);
        $recruiter->status = !$recruiter->status;
        $recruiter->save();

        return redirect()->back()->with('success', 'Recruiter status changed successfully');
    } // End Method
       
}
