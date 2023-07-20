@extends("admin.admin_dashboard")
@section("admin")
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <h1 class="h3">All Banner </h1>

                <div class="max-w-screen-xl px-5 mx-auto">
                    <form action="{{ route('banner#update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="my-20 overflow-x-auto border rounded-lg ">

                            <input type="hidden" name="id" value="{{ $bannerlist->id }}">

                            <h3>Banner Slider 1</h3>
                            <div class="grid grid-cols-5 mt-10 mb-3">
                                <div class="col-span-4 md:col-span-3 ">
                                    <input type="file" name="slide_one" id="bannerSlide1" class="TWform-file">
                                </div>
                                <div class="col-span-4 mt-12 mb-6 md:col-span-2 md:mb-0 md:mt-0">
                                    <img src="{{ (!empty($bannerlist->slide_one)) ? asset($bannerlist->slide_one):url('backend/assets/dist/img/banner/no_image.jpg') }}" class="w-10/12 ml-5 -mt-5 h-52 col-12" onclick="showFullSize()" id="showBannerSlide1">

                                    <div class="image-overlay">
                                        <span class="close-btn" onclick="closeFullSize()">&times;</span>
                                        <img src="{{ (!empty($bannerlist->slide_one)) ? asset($bannerlist->slide_one):url('backend/assets/dist/img/banner/no_image.jpg')}}" alt="Image" class="clickable-img" style="width: 80%;height:80%">
                                    </div>
                                </div>
                            </div>

                            <h3>Banner Slider 2</h3>
                            <div class="grid grid-cols-5 mt-10 mb-3">
                                <div class="col-span-4 md:col-span-3 ">
                                    <input type="file" name="slide_two" id="bannerSlide2" class="TWform-file">
                                </div>
                                <div class="col-span-4 mt-12 mb-6 md:col-span-2 md:mb-0 md:mt-0">
                                    <img src="{{ (!empty($bannerlist->slide_two)) ? asset($bannerlist->slide_two):url('backend/assets/dist/img/banner/no_image.jpg') }}" class="w-10/12 ml-5 -mt-5 h-52 col-12" onclick="showFullSize()" id="showBannerSlide2">

                                    <div class="image-overlay">
                                        <span class="close-btn" onclick="closeFullSize()">&times;</span>
                                        <img src="{{ (!empty($bannerlist->slide_two)) ? asset($bannerlist->slide_two):url('backend/assets/dist/img/banner/no_image.jpg')}}" alt="Image" class="clickable-img" style="width: 80%;height:80%">
                                    </div>
                                </div>
                            </div>


                            <h3>Banner Slider 3</h3>
                            <div class="grid grid-cols-5 mt-10 mb-3">
                                <div class="col-span-4 md:col-span-3 ">
                                    <input type="file" name="slide_three" id="bannerSlide3" class="TWform-file">
                                </div>
                                <div class="col-span-4 mt-12 mb-6 md:col-span-2 md:mb-0 md:mt-0">
                                    <img src="{{ (!empty($bannerlist->slide_three)) ? asset($bannerlist->slide_three):url('backend/assets/dist/img/banner/no_image.jpg') }}" class="w-10/12 ml-5 -mt-5 h-52 col-12" onclick="showFullSize()" id="showBannerSlide3">

                                    <div class="image-overlay">
                                        <span class="close-btn" onclick="closeFullSize()">&times;</span>
                                        <img src="{{ (!empty($bannerlist->slide_three)) ? asset($bannerlist->slide_three):url('backend/assets/dist/img/banner/no_image.jpg')}}" alt="Image" class="clickable-img" style="width: 80%;height:80%">
                                    </div>
                                </div>
                            </div>

                            <h3>Banner Slider 4</h3>
                            <div class="grid grid-cols-5 mt-10 mb-3">
                                <div class="col-span-4 md:col-span-3 ">
                                    <input type="file" name="slide_four" id="bannerSlide4" class="TWform-file">
                                </div>
                                <div class="col-span-4 mt-12 mb-6 md:col-span-2 md:mb-0 md:mt-0">
                                    <img src="{{ (!empty($bannerlist->slide_four)) ? asset($bannerlist->slide_four):url('backend/assets/dist/img/banner/no_image.jpg') }}" class="w-10/12 ml-5 -mt-5 h-52 col-12" onclick="showFullSize()" id="showBannerSlide4">

                                    <div class="image-overlay">
                                        <span class="close-btn" onclick="closeFullSize()">&times;</span>
                                        <img src="{{ (!empty($bannerlist->slide_four)) ? asset($bannerlist->slide_four):url('backend/assets/dist/img/banner/no_image.jpg')}}" alt="Image" class="clickable-img" style="width: 80%;height:80%">
                                    </div>
                                </div>
                            </div>

                           <div class="mt-10 mb-3">
                                <textarea name="description" cols="30" rows="10">
                                    {!! $bannerlist->description !!}
                                </textarea>
                           </div>

                           <div class="mt-10">
                                <button type="submit" class="rounded-lg btnTW-primary btnTW"><i class="fa-regular fa-floppy-disk"></i> Create</button>
                           </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
