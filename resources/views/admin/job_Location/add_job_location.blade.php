@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
<div class="container-fluid">

<div class="col-12">
<div class="card">
<div class="row">
    
<div class="col-lg-12">
<a href="{{ route('all.job_location')}}" class="btn btn-info sm" title="Edit Data "> List Job Location </a>
<div class="card">
<div class="card-body">

<h4 class="card-title mb-4">Job Category</h4>
<form action="{{ route('store.job_location')}}" method="post" enctype="multipart/form-data" class="auth-form">
@csrf

<div class="row">
<div class="col-lg-6">
<div class="mb-3">
<label class="form-label" for="progress-basicpill-lastname-input">Job Location</label>
<input type="text" name="name" placeholder="Job Location" class="form-control" id="progress-basicpill-lastname-input">
</div>
</div>

</div>
<div class="row">


</div>

<div class="row">
<div class="col-lg-6">
<div class="mb-3">
<button class="btn btn-primary" name="submit" type="submit">Submit form</button>
</div>
</div>

</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
	$(document).ready(function() {
		$('#image').change(function(e) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#showImage').attr('src', e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection