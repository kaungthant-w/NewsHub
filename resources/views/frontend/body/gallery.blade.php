@php
    $gallerylist = App\Models\Admin\PhotoGallery::latest()->get();
@endphp

<div class="mt-3 container-fluid">
    <h1 class="mb-3 h3">{{ GoogleTranslate::trans("Photo Gallery", app()->getLocale()) }}</h1>
    <div class="row">
        <div id="gallery" class="gallery_img">
            @foreach ($gallerylist as $newsList)
                <a href="{{ asset($newsList->photo_gallery) }}" class="gal_link">
                    <img src="{{ asset($newsList->photo_gallery) }}" alt="{{ $newsList->photo_gallery }}" class="rounded-3">
                </a>
            @endforeach
        </div>
    </div>
</div>
