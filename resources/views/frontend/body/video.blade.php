@php
    $videoGalleryList = App\Models\Admin\VideoGallery::latest()->get();
@endphp

<div class="mt-5 container-fluid">
    <h1 class="h3">Video Gallery</h1>
    <div class="row">
        @foreach ( $videoGalleryList as $gallery)
            <div class="mb-3 col-12 col-md-4 position-relative">
                <div class="KBmodal" data-content-url="{{ asset($gallery->url) }}" data-content-type="yt">
                    <img src="{{ asset($gallery->image) }}" class="img-thumbnail">

                    <div  class=" position-absolute top-50 start-50">
                        <i class="text-white fa-solid fa-play fs-3"></i>
                        </div>

                </div>

            </div>
        @endforeach
    </div>
</div>

