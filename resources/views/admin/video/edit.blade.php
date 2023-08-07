@extends("admin.admin_dashboard")
@section("admin")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">Update Video Gallery Page </h1>
            <a href="{{ route('video#gallery#list') }}" class="mt-5 rounded btnTW btnTW-info">Back</a>
            <div class="max-w-screen-xl px-5 mx-auto">
                <div class="my-12 overflow-x-auto border rounded-lg ">

                    <div class="col-span-6 mt-12 md:col-span-3 md:mt-0">
                        <form id="myForm" action="{{ route('video#gallery#update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $videoEdit->id }}">
                            <div class="p-3">
                                <h4 class="text-3xl font-bold text-blue-400">Update Video Gallery</h4>

                                <div class="my-5 lg:w-6/12">
                                    <input type="text" name="title" class="TWform-control @error('title') is-invalid @enderror"  placeholder="Enter Video Title" value="{{ $videoEdit->title }}">
                                    @error('title')
                                        <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                                            {{$message}}
                                        </div>
                                    @endif
                                </div>

                                <div class="my-5 lg:w-6/12">
                                    <input type="text" name="url" class="TWform-control @error('url') is-invalid @enderror"  placeholder="Enter Video URL" value="{{ $videoEdit->url }}">
                                    @error('url')
                                        <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                                            {{$message}}
                                        </div>
                                    @endif
                                </div>

                                <div class="grid grid-cols-4 mt-10 mb-3">
                                    <div class="col-span-4 md:col-span-2 ">
                                        <input type="file" name="image" id="image" class="TWform-file @error('image') is-invalid @enderror">

                                        @error('image')
                                        <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                                            {{$message}}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="my-3">
                                    <img src="{{ (!empty(asset($videoEdit->image))) ? asset($videoEdit->image):url('backend/assets/dist/img/video/no_image.jpg') }}" class="mt-5" onclick="showFullSize()" id="showImage">

                                    <div class="image-overlay">
                                        <span class="close-btn" onclick="closeFullSize()">&times;</span>
                                        <img src="{{ (!empty($videoEdit->image)) ? asset($videoEdit->image):url('backend/assets/dist/img/video/no_image.jpg') }}" alt="{{ $videoEdit->image }}" class="clickable-img" style="width: 80%;height:80%">
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="mt-6 rounded btnTW btnTW-primary"><i class="fa-solid fa-floppy-disk"></i> update </button>
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
