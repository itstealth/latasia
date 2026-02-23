@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="fw-bold mb-0">🎬 List Video</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Tables</a></li>
                            <li class="breadcrumb-item active" aria-current="page">List Video</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Add Video Button -->
        <div class="mb-3">
            <a href="{{ route('add.videoGallery') }}" class="btn btn-primary rounded-pill shadow-sm">
                <i class="fas fa-plus me-1"></i> Add Video
            </a>
        </div>

        <!-- Card -->
        <div class="card shadow-sm rounded-3">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-3">📋 Video List</h5>

                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered table-hover align-middle text-nowrap">
                        <thead class="table-primary text-center align-middle">
                            <tr>
                                <th style="width: 60px;">Sr</th>
                                <th>Title</th>
                                <th>Video Category</th>
                                <th>Video Preview</th>
                                <th style="width: 160px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($videogallery_all as $item)
                                <tr>
                                    <td class="text-center fw-bold">{{ $i++ }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->videocategory }}</td>
                                    <td>
                                        @php
                                            $url = $item->video_url;
                                            $embed = '';

                                            if (Str::contains($url, 'youtube.com') || Str::contains($url, 'youtu.be')) {
                                                preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/', $url, $matches);
                                                $videoId = $matches[1] ?? null;

                                                if ($videoId) {
                                                    $embed = '<iframe width="220" height="124" src="https://www.youtube.com/embed/'.$videoId.'" frameborder="0" allowfullscreen style="border-radius:8px;"></iframe>';
                                                }
                                            } elseif(Str::endsWith($url, ['.mp4','.webm','.ogg'])) {
                                                $embed = '<video width="220" height="124" controls style="border-radius:8px;"><source src="'.$url.'" type="video/mp4">Your browser does not support video.</video>';
                                            } else {
                                                $embed = '<a href="'.$url.'" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill">View Video</a>';
                                            }
                                        @endphp
                                        {!! $embed !!}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('eidt.videourl', $item->id) }}"
                                           class="btn btn-sm btn-success rounded-pill me-1 d-inline-flex align-items-center"
                                           title="Edit">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                        <a href="{{ route('delete.verticals', $item->id) }}"
                                           class="btn btn-sm btn-danger rounded-pill d-inline-flex align-items-center"
                                           title="Delete" onclick="return confirm('Are you sure you want to delete this video?')">
                                            <i class="fas fa-trash-alt me-1"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection