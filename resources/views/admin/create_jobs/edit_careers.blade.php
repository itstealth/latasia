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
						<h4 class="mb-sm-0">Add Careers</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
								<li class="breadcrumb-item active">New Careers</li>
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
							<h4 class="card-title mb-4">New Careers</h4>
							<form action="{{ route('update.careers') }}" method="post" enctype="multipart/form-data" class="auth-form">
								@csrf
                                <input type="hidden" name="id" value="{{$careers->id}}">
								<div class="row">

									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label" for="progress-basicpill-firstname-input">Job Title</label>
											<input type="text" name="v_title" value="{{ $careers->v_title }}"  class="form-control" id="progress-basicpill-lastname-input">
										</div>
									</div>

									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label" for="progress-basicpill-firstname-input">Experience</label>
											<input type="text" name="v_experience"  value="{{ $careers->v_experience }}" class="form-control"  id="progress-basicpill-lastname-input">
										</div>
									</div>

								</div>

								<div class="row">

									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label" for="progress-basicpill-firstname-input">Company Name</label>
											<input name="company_name" value="{{ $careers->company_name }}" type="text" id="" class="form-control">
										</div>
									</div>
                                    <div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label" for="progress-basicpill-firstname-input">Location</label>
											<input name="location" value="{{ $careers->location }}" type="text" id="" class="form-control">
										</div>
									</div>
									
								</div>
                                <div class="row">

									<div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label" for="progress-basicpill-firstname-input">Job Type</label>
											<input name="v_type" value="{{ $careers->v_type }}" type="text" id="" class="form-control">
										</div>
									</div>
                                    <div class="col-lg-6">
										<div class="mb-3">
											<label class="form-label" for="progress-basicpill-firstname-input">Keyword</label>
											<input name="keywords" value="{{ $careers->keywords }}" type="text" id="" class="form-control">
										</div>
									</div>
									
								</div>
                                <div class="row">

									
									<div class="col-lg-6">
                                        <div class="mb-3">
                                        <label class="form-label" for="progress-basicpill-firstname-input">Image</label>
                                        <input name="v_image" type="file" class="form-control"   id="image" >
                                        </div>
                                        </div>
                                        <div class="row mb-3">
                                        <div class="col-sm-10">
                                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                        <img class="rounded-circle avatar-xl" src="{{ asset( $careers->v_image) }}" id="showImage" alt="Card image cap">
                                        </div>
                                         </div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="form-control-label">Careers Description</label>

											<textarea class="form-control" id="elm1" name="v_description">{!! $careers->v_description !!}</textarea>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-6">
										<div class="mb-3">
											<button class="btn btn-primary" name="submit" type="submit">Submit</button>
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
		width: '100%',
		height: 250,
	});
</script>

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