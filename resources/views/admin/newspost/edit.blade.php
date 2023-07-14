@extends("admin.admin_dashboard")
@section("admin")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">Edit News post Page </h1>
            <a href="{{ route('newspost#list') }}" class="mt-5 rounded btnTW btnTW-info">Back</a>
            <div class="max-w-screen-xl px-5 mx-auto">
                <div class="my-12 overflow-x-auto border rounded-lg ">

                    <div class="col-span-6 mt-12 md:col-span-3 md:mt-0">
                        <form id="myForm" action="{{ route('newspost#update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $newspost->id }}">
                            <div class="p-3">
                                <h4 class="text-3xl font-bold text-blue-400">Edit News Post</h4>

                                <div class="grid grid-cols-4 mt-10 mb-3">
                                    <div class="col-span-4 md:col-span-2 ">
                                        <input type="file" name="image" id="image" class="TWform-file">
                                    </div>
                                    <div class="col-span-4 mt-12 mb-6 md:col-span-2 md:mb-0 md:mt-0">
                                        <img src="{{ (!empty(asset($newspost->image))) ? asset($newspost->image):url('backend/assets/dist/img/newspost/news_img/no_image.jpg') }}" class="ml-5 -mt-5 profile-img col-12" onclick="showFullSize()" id="showImage"  >

                                        <div class="image-overlay">
                                            <span class="close-btn" onclick="closeFullSize()">&times;</span>
                                            <img src="{{ (!empty($newspost->image)) ? asset($newspost->image):url('backend/assets/dist/img/newspost/no_image.jpg') }}" alt="Image" class="clickable-img" style="width: 80%;height:80%">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-5 lg:w-6/12">
                                    <select name="category_id" id="category_id" class="TWform-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $newspost->category_id ? 'selected':'' }} >{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-5 lg:w-6/12">
                                    <select name="subcategory_id" id="" class="TWform-control">
                                        <option value="">Select Subcategory</option>
                                        @foreach ($subcategories as $subcategory )
                                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $newspost->subcategory_id ? 'selected':'' }} >{{ $subcategory->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-5 lg:w-6/12 ">
                                    <select name="user_id" id="" class="TWform-control">
                                        @foreach ($adminuser as $writer )
                                            <option value="{{ $writer->id }}">{{ $writer-> name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="my-5 lg:w-6/12">
                                    <input type="text" name="news_title" value="{{ $newspost->news_title }}" class="TWform-control"  placeholder="Enter News Title">
                                </div>


                                <div class="my-5 lg:w-6/12">
                                    <textarea name="news_details" class="TWform-control" id="" cols="30" rows="5" placeholder="Enter News details">{{ $newspost->news_details }}</textarea>
                                </div>

                                <div class="my-8 lg:w-6/12">
                                    <input type="text" name="tags" class="selectize-close-btn TWform-control" value=" {{ $newspost->tags }} " placeholder="Add Tags">
                                </div>

                                <div class="flex mb-12">
                                    <div class="flex gap-4 lg:w-3/12 TWtext-success">
                                        <div class="">
                                            <input type="checkbox" name="breaking_news" id="breaking_news" value="1" {{ $newspost->breaking_news==1 ? 'checked':'' }} >
                                            <label for="breaking_news" class="text-sm md:text-lg">Breaking News</label>
                                        </div>
                                        <div class="">
                                            <input type="checkbox" name="top_slider" id="top_slider" value="1" {{ $newspost->top_slider==1 ? 'checked':'' }} >
                                            <label for="top_slider" class="text-sm md:text-lg">Top Slider</label>
                                        </div>
                                    </div>
                                    <div class="flex gap-4 lg:w-3/12">
                                        <div class="TWtext-danger">
                                            <input type="checkbox" name="first_section_three" id="first_section_three" value="1" {{ $newspost->first_section_three==1 ? 'checked':'' }} >
                                            <label for="first_section_three" class="text-sm md:text-lg">Section Three</label>
                                        </div>
                                        <div class="TWtext-danger">
                                            <input type="checkbox" name="first_section_eight" id="first_section_eight" value="1" {{ $newspost->first_section_eight==1 ? 'checked':'' }}>
                                            <label for="first_section_eight" class="text-sm md:text-lg">Section Eight</label>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="rounded btnTW btnTW-primary"><i class="fa-regular fa-pen-to-square"></i> Update News</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
