@php
$category =App\Models\JobCategories::latest()->get();
@endphp

<section class="py-20 dark:bg-neutral-800">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-5">
            <div class="text-center">
                <h3 class="mb-3 text-3xl text-gray-900 dark:text-gray-50">Browser Jobs Categories</h3>

            </div>
        </div>
        <div class="row">
            @foreach($category as $item)
            <div class="col-lg-3 col-md-6 mt-4 pt-2">
                <div class="popu-category-box rounded text-center">
                    <div class="popu-category-icon icons-md">
                        <i class="{{ $item->icon }}"></i>
                    </div>
                    <div class="popu-category-content mt-4">
                        <a href="{{ url('job-listing?category='.$item->id) }}" class="text-dark stretched-link">
                            <h5 class="fs-18">{{ $item->name }}</h5>
                        </a>
                        <!-- <p class="text-muted mb-0">2024 Jobs</p> -->
                    </div>
                </div><!--end popu-category-box-->
            </div>
            @endforeach
        </div>
        <div class="grid grid-cols-1">
            <div class="mt-5 text-center">
                <a href="{{ url('job-listing?category='.$item->id) }}" class="text-white border-transparent group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 btn hover:-translate-y-2">Browse All Categories <i class="uil uil-arrow-right ms-1"></i></a>
            </div>
        </div>


    </div>
</section>