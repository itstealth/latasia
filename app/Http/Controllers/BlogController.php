<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Quick;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function AddBlog()
    {
        return view('admin.blog.blog_add');
    } // End Method

    public function StoreBlog(Request $request)
    {
        $image = $request->file('blog_image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        $save_url = 'upload/blog/' . $name_gen;

        // Move the uploaded file to the specified folder
         $image->move(public_path('upload/blog'), $name_gen);

        Blog::insert([

            'blog_title' => $request->blog_title,
            'country' => $request->country,
            'blog_date' => $request->blog_date,
            'blog_image' => $save_url,
            'blog_description' => $request->blog_description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Vacancy Add Successfully ',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog')->with($notification);
    } // End Method

    public function AllBlog()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog.blog_all', compact('blogs'));
    } // End Method

    public function EditBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        return view('admin.blog.blog_edit', compact('blogs'));
    } // End Method

    public function UpdateBlog(Request $request)
    {
        $blog_id = $request->id;
        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');

            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'upload/blog/' . $name_gen;
         // Move the uploaded file to the specified folder
         $image->move(public_path('upload/blog'), $name_gen);
         
            Blog::findOrfail($blog_id)->update([

                'blog_title' => $request->blog_title,
                'country' => $request->country,
                'blog_date' => $request->blog_date,
                'blog_image' => $save_url,
                'blog_description' => $request->blog_description,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => ' Blog Update Successfully With Image ',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog')->with($notification);
        } else {

            Blog::findOrfail($blog_id)->update([

                'blog_title' => $request->blog_title,
                'country' => $request->country,
                'blog_date' => $request->blog_date,
                'blog_description' => $request->blog_description,
                'updated_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Blog Update Successfully Without Images ',
                'alert-type' => 'success'
            );
            return redirect()->route('all.blog')->with($notification);
        }
    } // End Method

    public function DeleteBlog($id)
    {
        $portfolio = Blog::findorFail($id);

        Blog::findorFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method

    public function FrontBlog()
    {
        $front_all_blogs = Quick::orderBy('id','desc')->paginate(3);
       
        return view('frontend.blog', compact('front_all_blogs'));    
    }// End Method

    public function BlogDetails($id)
    {
       
        $blogs_details =Quick::where('id',$id)->first();
        $blogs_country = Blog::latest()->get();
        return view('frontend.blog_detils', compact('blogs_details','blogs_country'));
    }// End Method
}
