<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    

    public function AllEmployee()
    {
       $employees = Employee::latest()->get();
        return view('admin.employee.all_employee',compact('employees'));

    } // End Methods

    public function AddEmployee()
    {
        return view('admin.employee.employee_add');
    } // End Method

    public function StoreEmployee(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:employees,email',
            'phone'    => 'required|unique:employees,phone',
            'password' => 'required|min:6',
        ]);
      $lastEmployee = Employee::latest('id')->first();
       $nextNumber = $lastEmployee ? $lastEmployee->id + 1 : 1;

    // Generate LATASIA Employee Code
    $employee_code = 'LATASIA-EMPL-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        Employee::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'password'       => Hash::make($request->password),

            'address'        => $request->address,

            'employee_code' => $employee_code,
            'status'         => 1,
            'created_at'    => Carbon::now('Asia/Kolkata'),
            'updated_at'    => Carbon::now('Asia/Kolkata'),
        ]);

        return redirect()->back()->with('success', 'Employer created successfully');
    }



    public function EditEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employee.employee_edit', compact('employee'));
    } // End Method

    public function UpdateEmployee(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:employees,email,' . $id,
            'phone'    => 'required|unique:employees,phone,' . $id,
            'address'  => 'required|string|max:255',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->updated_at = Carbon::now('Asia/Kolkata');
        $employee->save();

        return redirect()->route('all.employee')->with('success', 'Employee updated successfully');
    } // End Method

    public function DeleteEmployee($id)
    {
        Employee::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Employee deleted successfully');
    } // End Method

    public function ChangeEmployeeStatus($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->status = !$employee->status;
        $employee->save();

        return redirect()->back()->with('success', 'Employee status changed successfully');
    } // End Method
       
}
