@extends("admin.admin_dashboard")
@section("admin")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">Add News post Page </h1>
            <a href="{{ route('newspost#list') }}" class="mt-5 rounded btnTW btnTW-info">Back</a>
            <div class="max-w-screen-xl px-5 mx-auto">
                <div class="my-12 overflow-x-auto border rounded-lg ">

                    <div class="col-span-6 mt-12 md:col-span-3 md:mt-0">
                        <form id="myForm" action="{{ route('admin#news#store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="p-3">
                                <h4 class="text-3xl font-bold text-blue-400">Add News Post</h4>

                                <div class="grid grid-cols-4 mt-10 mb-3">
                                    <div class="col-span-4 md:col-span-2 ">
                                        <input type="file" name="image" id="image" class="TWform-file">
                                    </div>
                                    <div class="col-span-4 mt-12 mb-6 md:col-span-2 md:mb-0 md:mt-0">
                                        <img src="{{ (!empty($newspost->image)) ? asset($newspost->image):url('backend/assets/dist/img/newspost/no_image.jpg') }}" class="ml-5 -mt-5 profile-img col-12" onclick="showFullSize()" id="showImage" alt="">

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
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-5 lg:w-6/12">
                                    <select name="subcategory_id" id="" class="TWform-control">

                                        <option value="">Select Subcategory</option>
                                        @foreach ($subcategories as $subcategory )
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <div class="mb-5 lg:w-6/12">
                                    <select name="subcategory_id" id="subcategory_id" class="TWform-control">
                                        <option></option>
                                    </select>
                                </div> --}}

                                <div class="mb-5 lg:w-6/12 ">
                                    <select name="user_id" id="" class="TWform-control">
                                        <option value="">Select Writer</option>
                                        @foreach ($adminuser as $writer )
                                            <option value="{{ $writer->id }}">{{ $writer-> name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="my-5 lg:w-6/12">
                                    <input type="text" name="news_title" class="TWform-control"  placeholder="Enter News Title">
                                </div>


                                <div class="my-5 lg:w-6/12">
                                    <textarea name="news_details" class="TWform-control" id="" cols="30" rows="5" placeholder="Enter News details"></textarea>
                                </div>

                                <div class="my-8 lg:w-6/12">
                                    <input type="text" name="tags" class="selectize-close-btn TWform-control" value="" placeholder="Add Tags">
                                </div>

                                <div class="flex mb-12">
                                    <div class="flex gap-4 lg:w-3/12 TWtext-success">
                                        <div class="">
                                            <input type="checkbox" name="breaking_news" id="breaking_news" value="1">
                                            <label for="breaking_news" class="text-sm md:text-lg">Breaking News</label>
                                        </div>
                                        <div class="">
                                            <input type="checkbox" name="top_slider" id="top_slider" value="1">
                                            <label for="top_slider" class="text-sm md:text-lg">Top Slider</label>
                                        </div>
                                    </div>
                                    <div class="flex gap-4 lg:w-3/12">
                                        <div class="TWtext-danger">
                                            <input type="checkbox" name="first_section_three" id="first_section_three" value="1">
                                            <label for="first_section_three" class="text-sm md:text-lg">Section Three</label>
                                        </div>
                                        <div class="TWtext-danger">
                                            <input type="checkbox" name="first_section_eight" id="first_section_eight" value="1">
                                            <label for="first_section_eight" class="text-sm md:text-lg">Section Eight</label>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="rounded btnTW btnTW-primary"><i class="fa-regular fa-floppy-disk"></i> Save News</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


    <script type="text/javascript">

        $(document).ready(function(){
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/"+category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data){
                            $('select[name="subcategory_id"]').html('');
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'"> ' + value.subcategory_name + '</option>');
                            });
                        },
                    });
                } else{
                    alert('danger');
                }
            });
        });



    </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

@endsection
