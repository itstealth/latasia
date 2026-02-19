<?php

namespace App\Http\Controllers;

use App\Models\Quick;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminQuickController extends Controller
{
   public function AllQuick()
   {
      $quick_all = Quick::orderBy('id', 'ASC')->get();
      return view('admin.quick.all_quick', compact('quick_all'));
   } // End Method
   public function AddQuick()
   {
      return view('admin.quick.add_quick');
   } // End Method
   
   public function StoreQuick(Request $request)
    {
        $image = $request->file('quick_image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        $save_url = 'upload/quick/' . $name_gen;

        // Move the uploaded file to the specified folder
        $image->move(public_path('upload/quick'), $name_gen);
        Quick::insert([

            'title' => $request->title,
            'quick_image' => $save_url,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('all.quick');
    } // End Method
   public function EditQuick($id)
   {
      $quick_edit = Quick::findOrFail($id);
      return view('admin.quick.edit_quick', compact('quick_edit'));
   } //End Method
   public function UpdateQuick(Request $request)
{
    $quick_id = $request->id;

    if ($request->file('quick_image')) {
        $image = $request->file('quick_image'); // Fix: assign the uploaded file

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'upload/quick/' . $name_gen;

        // Move the uploaded file to the specified folder
        $image->move(public_path('upload/quick'), $name_gen);

        Quick::findOrFail($quick_id)->update([
            'title' => $request->title,
            'quick_image' => $save_url,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
    } else {
        Quick::findOrFail($quick_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
    }

    return redirect()->route('all.quick')->with('success', 'Quick update successful');
}
   public function DeleteQuick($id)
   {
      Quick::where('id', $id)->delete();
      return redirect()->route('all.quick');
   } //End Method

   public function CarrerDetails($id)
   {
      $carres_details =Quick::where('id',$id)->first();
      
     
        return view('frontend.carrer_detils', compact('carres_details'));
   }// End Mehods
}
