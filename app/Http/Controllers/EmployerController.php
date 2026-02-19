<?php

namespace App\Http\Controllers;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EmployerController extends Controller
{
    

    public function AllEmployer()
    {
       $employers = Employer::latest()->get();
        return view('admin.employer.all_employer',compact('employers'));

    } // End Methods

    public function AddEmployer()
    {
        return view('admin.employer.employer_add');
    } // End Method

    public function StoreEmployer(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:employers,email',
            'phone'    => 'required|unique:employers,phone',
            'password' => 'required|min:6',
        ]);
      $lastEmployer = Employer::latest('id')->first();
       $nextNumber = $lastEmployer ? $lastEmployer->id + 1 : 1;

    // Generate LATASIA Employer Code
    $employerCode = 'LATASIA-EMP-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        Employer    ::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'password'       => Hash::make($request->password),

            'address'        => $request->address,
            
            'employer_code' => $employerCode,
             'company_name' => $request->company_name,
              'city' => $request->city,
               'state' => $request->state,
                'country' => $request->country,
                 'contact_person' => $request->contact_person,
                 'contact_phone' => $request->contact_phone,
            'status'         => 1,
            'created_at'    => Carbon::now('Asia/Kolkata'),
            'updated_at'    => Carbon::now('Asia/Kolkata'),
        ]);

        return redirect()->back()->with('success', 'Employer created successfully');
    }



    public function EditEmployer($id)
    {
        $employer = Employer::findOrFail($id);
        return view('admin.employer.employer_edit', compact('employer'));
    } // End Method

    public function UpdateEmployer(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:employers,email,' . $id,
            'phone'    => 'required|unique:employers,phone,' . $id,
            'address'  => 'required|string|max:255',
        ]);

        $employer = Employer::findOrFail($id);
        $employer->name = $request->name;
        $employer->email = $request->email;
        $employer->phone = $request->phone;
        $employer->address = $request->address;
        $employer->updated_at = Carbon::now('Asia/Kolkata');
        $employer->save();

        return redirect()->route('all.employer')->with('success', 'Employer updated successfully');
    } // End Method

    public function DeleteEmployer($id)
    {
        Employer::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Employer deleted successfully');
    } // End Method

    public function ChangeEmployerStatus($id)
    {
        $employer = Employer::findOrFail($id);
        $employer->status = !$employer->status;
        $employer->save();

        return redirect()->back()->with('success', 'Employer status changed successfully');
    } // End Method
       
}
