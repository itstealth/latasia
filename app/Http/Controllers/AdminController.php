<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\NewInvoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth; 

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }// end Methods

    public function Profile()
    {
        $id = Auth:: user()->id;
        $AdminData=User::find($id);
        return view('admin.admin_profile',compact('AdminData')); 

    } // End Methods
    public function EditProfile()
    {
        $id = Auth:: user()->id;
        $editData=User::find($id);
        return view('admin.admin_profile_edit',compact('editData')); 
  
    }

    public function UpdateProfile(Request $request)
    {
        $id = Auth:: user()->id; 
        $data =  User::find($id); 
        $data->name=$request->name;
        $data->email=$request->email;
        if($request->file('profile_image'))
        {
            $file = $request->file('profile_image');

            $filename = date('Ymdhi').$file->getClientOriginalName();

            $file->move(public_path('upload/admin_image'),$filename);

            $data['profile_image'] = $filename;
        }

        $data->save();

        $notification = array(
           'message' =>'Admin Profile Updated Successfully',
           'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }// End Method

public function InvoiceAdd()
    {
        return view('admin.invoice.invoices_add');
    }

public function StoreInvoiceSave(Request $request)
{
    // âœ… VALIDATION (Passport fields removed)
    $validated = $request->validate([
        'customer_name'      => 'required|string',
        'customer_address'   => 'required|string',
        'description'        => 'required|string',
        'quantity'           => 'required|numeric|min:1',
        'unit_price'         => 'required|numeric|min:0',
        'issue_date'         => 'required|date',
        'fulfillment_date'   => 'required|date',
        'payment_deadline'   => 'required|date',
    ]);

    // ðŸ”’ SERVER-SIDE CALCULATION
    $netPrice   = $validated['quantity'] * $validated['unit_price'];
    $vatValue   = 0;
    $grossPrice = $netPrice;

    // ðŸ”¢ SAFE INVOICE NUMBER GENERATION
    $lastId = NewInvoice::max('id') ?? 0;
    $invoiceNumber = 'A-' . date('Y') . '-' . ($lastId + 1);

    // ðŸ’¾ SAVE INVOICE
    $invoice = NewInvoice::create([

        // ================= COMPANY =================
        'company_name'    => 'All 4 You Work Force KFT.',
        'company_address' => '6000 KecskemÃ©t, Katona JÃ³zsef u.1',
        'tax_number'      => '32530960-2-13',

        // ================= BANK =================
        'iban'             => 'LT393250009267185658',
        'currency'         => 'HUF',
        'swift'            => 'REVOLT21',
        'intermediary_bic' => 'BARCGB22',

        // ================= INVOICE INFO =================
        'invoice_number'   => $invoiceNumber,
        'issue_date'       => $validated['issue_date'],
        'fulfillment_date' => $validated['fulfillment_date'],
        'payment_deadline' => $validated['payment_deadline'],

        // ================= CUSTOMER =================
        'customer_name'    => $validated['customer_name'],
        'customer_address' => $validated['customer_address'],

        // ================= SERVICE =================
        'description' => $validated['description'],
        'quantity'    => $validated['quantity'],
        'unit_price'  => $validated['unit_price'],
        'net_price'   => $netPrice,
        'vat_type'    => 'AAM',
        'vat_value'   => $vatValue,
        'gross_price' => $grossPrice,
    ]);

    // ðŸ“„ REDIRECT TO PDF
    return redirect()->route('admin.invoice.pdf', $invoice->id);
}




public function downloadInvoice(NewInvoice $invoice)
{
    $logoPath = public_path('backend/assets/images/logo45.jpg');

    if (!file_exists($logoPath)) {
        $logoPath = null;
    }

    // Get customer name safely
    $customerName = $invoice->customer_name 
        ?? optional($invoice->customer)->name 
        ?? 'customer';

    // Clean name for file (avoid spaces & special chars)
    $safeCustomerName = str_replace(' ', '-', strtolower($customerName));

    $pdf = Pdf::loadView('admin.invoice.pdf', [
        'invoice'      => $invoice,
        'logoPath'     => $logoPath,
        'customerName' => $customerName,
    ])->setPaper('A4', 'portrait');

    // ✅ File name like: zuber-invoice-A-2026-8.pdf
    return $pdf->download(
        $safeCustomerName . '-invoice-' . $invoice->invoice_number . '.pdf'
    );
}


public function InvoiceList()
    {
        $invoices = NewInvoice::latest()->get();
        return view('admin.invoice.invoices_list',compact('invoices'));
    }


}
