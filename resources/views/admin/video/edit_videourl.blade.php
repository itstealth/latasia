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
						<h4 class="mb-sm-0">Edit Video URL</h4>

						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
								<li class="breadcrumb-item active">Edit Video URL</li>
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
							<h4 class="card-title mb-4">Edit Video URL</h4>
							<form action="{{ route('update.videourl') }}" method="post" enctype="multipart/form-data" class="auth-form">
                                @csrf
                                <input type="hidden" name="id" value="{{ $edit_videourl->id}}">
                                <div class="row">
                                    <!-- Title -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" name="title" value="{{ $edit_videourl->title}}" placeholder="Enter video title" class="form-control" id="title">
                                        </div>
                                    </div>
                            
                                    <!-- Video Category -->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="category">Video Category</label>
                                            <select name="videocategory" class="form-select" id="category">
                                                <option value="">-- Select Category --</option>
                                                <option value="Welder" {{ $edit_videourl->videocategory == 'Welder' ? 'selected' : '' }}>Welder</option>
                                                <option value="Construction" {{ $edit_videourl->videocategory == 'Construction' ? 'selected' : '' }}>Construction</option>
                                                <option value="Transportation" {{ $edit_videourl->videocategory == 'Transportation' ? 'selected' : '' }}>Transportation</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Description -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="description">Description</label>
                                            <textarea class="form-control" id="elm1" name="description" rows="5" placeholder="Enter video description...">{!! $edit_videourl->description  !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Video URL -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="video_url">Video URL</label>
                                            <input type="url" name="video_url" value="{{ $edit_videourl->video_url}}" class="form-control" id="video_url">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="category">Select Verticals</label>
                                            <select class="select2 form-control select2-multiple" name="verticals_id">
                                                <option>Select Verticals</option>
                                                @foreach($vartics as $item)
                                                    
                                                    <option value="{{ $item->id }}" {{ $item->id == $edit_videourl->verticals_id  ? 'Selected' : '' }}>{{ $item->title }}</option>
                                                @endforeach
                                            </select>  
                                        </div>
                                    </div>
                                </div>
                            
                                <hr>
                            
                                <!-- Submit Button -->
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