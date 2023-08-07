@extends("admin.admin_dashboard")
@section("admin")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">Add Photo Gallery Page </h1>
            <a href="{{ route('gallery#list') }}" class="mt-5 rounded btnTW btnTW-info">Back</a>
            <div class="max-w-screen-xl px-5 mx-auto">
                <div class="my-12 overflow-x-auto border rounded-lg ">

                    <div class="col-span-6 mt-12 md:col-span-3 md:mt-0">
                        <form id="myForm" action="{{ route('gallery#save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="p-3">
                                <h4 class="text-3xl font-bold text-blue-400">Add Photo Gallery</h4>

                                <div class="grid grid-cols-4 mt-10 mb-3">
                                    <div class="col-span-4 md:col-span-2 ">
                                        <input type="file" name="image_multiple[]" id="multiImg" class="TWform-file  @error('image_multiple[]') is-invalid @enderror" multiple>
                                        @error('image_multiple[]')
                                            <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                                                {{$message}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-10 mb-3 ">
                                    <div class="flex gap-4" id="preview_img"></div>
                                </div>
                                <div>
                                    <button type="submit" class="mt-6 rounded btnTW btnTW-primary"><i class="fa-solid fa-floppy-disk"></i> Add Gallery</button>
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
