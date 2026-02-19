@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
<div class="container-fluid">

<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
<h4 class="mb-sm-0">Edit Blog</h4>

<div class="page-title-right">
<ol class="breadcrumb m-0">
<li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
<li class="breadcrumb-item active">Edit Blog</li>
</ol>
</div>

</div>
</div>
</div>
<!-- end page title -->

<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<h4 class="card-title mb-4">New Blog</h4>
<form action="{{ route('update.blog') }}" method="post" enctype="multipart/form-data" class="auth-form">
@csrf
<input type="hidden" name="id" value="{{$blogs->id}}">
<div class="row">

<div class="col-lg-6">
<div class="mb-3">
<label class="form-label" for="progress-basicpill-firstname-input">Blog Title</label>
<input type="text" name="blog_title"value="{{ $blogs->blog_title }}" class="form-control" id="progress-basicpill-lastname-input">
</div>
</div>

<div class="col-lg-6">
<div class="mb-3">
<label class="form-label" for="progress-basicpill-firstname-input">Blog For Country</label>
<input type="text" name="country" class="form-control" value="{{ $blogs->country }}" id="progress-basicpill-lastname-input">
</div>
</div>




</div>

<div class="row">

<div class="col-lg-6">
<div class="mb-3">
<label class="form-label" for="progress-basicpill-firstname-input">Blog Date</label>
<input name="blog_date" type="date" id="date" value="{{ $blogs->blog_date }}" class="form-control">
</div>
</div>

<div class="col-lg-6">
<div class="mb-3">
<label class="form-label" for="progress-basicpill-firstname-input">Blog Image</label>
<input name="blog_image" type="file" class="form-control"   id="image" >
</div>
</div>
<div class="row mb-3">
<div class="col-sm-10">
<label for="example-text-input" class="col-sm-2 col-form-label"></label>
<img class="rounded-circle avatar-xl" src="{{ asset( $blogs->blog_image) }}" id="showImage" alt="Card image cap">
</div>
 </div>



</div>
<div class="row">
			  <div class="col-md-12">
				<div class="form-group">
				  <label class="form-control-label">Blog Description</label>
				  
          <textarea class="form-control" id="elm1" name="blog_description">{!! $blogs->blog_description !!}</textarea>
				</div>
			  </div>
        
			  
			</div>

            <hr>
           
<div class="row">
<div class="col-lg-6">
<div class="mb-3">
<button class="btn btn-primary" name="submit" type="submit">Update</button>
</div>
</div>

</div>
</form>
</div>
</div>
</div>
</div>
<!-- end row -->

</div>

</div>
</div>

<script type="text/javascript">
	tinymce.init({
	    selector: '#content',
      width:'100%',
        height: 250,
	});
</script>
<script>
$(document).ready(function(){
    $('#image').change(function(e)
    {
      var reader = new FileReader();
      reader.onload =   function(e)
      {
        $('#showImage').attr('src',e.target.result);
      }   
      reader.readAsDataURL(e.target.files['0']);
    });
});
</script>
@endsection