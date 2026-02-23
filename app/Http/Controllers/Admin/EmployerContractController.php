<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employer;
use App\Models\Project;
use App\Models\EmployerContract;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EmployerContractController extends Controller
{
    public function AllEmployerContracts()
    {
        $employers = Employer::latest()->get();

        $employerContracts = EmployerContract::latest()->get();
        return view('admin.employercontract.all_employer_contracts',compact('employers','employerContracts'));

    } // End Methods


     public function AddEmployerContract()
    {
        $employers = Employer::latest()->get();

        return view('admin.employercontract.employer_contracts_add',compact('employers'));
    } // End Method

    public function StoreEmployerContract(Request $request)
    {
        
        EmployerContract::create([
            'employer_id' => $request->employer_id,
            'contract_code' => $request->contract_code,
            'contract_name' => $request->contract_name,
            'billing_model' => $request->billing_model,
            'billing_cycle' => $request->billing_cycle,
            'payment_terms' => $request->payment_terms,
            'minimum_billable_hours' => $request->minimum_billable_hours,
            'hourly_rate' => $request->hourly_rate,
            'fixed_amount' => $request->fixed_amount,
            'tax_percentage' => $request->tax_percentage,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
           
            'created_at' => Carbon::now('Asia/Kolkata'),
            'updated_at' => Carbon::now('Asia/Kolkata'),
        ]);

        return redirect()->route('all.employer.contract');
    }// End Method

     public function EditEmployerContract($id)
    {
        $employerContract = EmployerContract::findOrFail($id);
        $employers = Employer::latest()->get();
        return view('admin.employercontract.employer_contracts_edit', compact('employerContract', 'employers'));
    } // End Method

     public function UpdateEmployerContract(Request $request, $id)
{
    $employerContract = EmployerContract::findOrFail($id);

    $employerContract->update([
        'employer_id' => $request->employer_id,
        'contract_code' => $request->contract_code,
        'contract_name' => $request->contract_name,
        'billing_model' => $request->billing_model,
        'billing_cycle' => $request->billing_cycle,
        'payment_terms' => $request->payment_terms,
        'minimum_billable_hours' => $request->minimum_billable_hours,
        'hourly_rate' => $request->hourly_rate,
        'fixed_amount' => $request->fixed_amount,
        'tax_percentage' => $request->tax_percentage,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'status' => $request->status,
    ]);

    return redirect()->route('all.employer.contract');
}// End Method


 public function DeleteEmployerContract($id)
    {
        EmployerContract::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Employer Contract deleted successfully');
    } // End Method
       

}
