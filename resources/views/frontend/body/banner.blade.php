@php
    $bannerlist = App\Models\Admin\Banner::findOrFail(1);
@endphp

<div class="py-3 mt-2 shadow-sm mt-lg-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6">
                <div id="bannerSlider" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="3000">
                        <img src="{{ asset($bannerlist->slide_one) }}" class="d-block w-100" alt="">
                      </div>
                      <div class="carousel-item" data-bs-interval="2000">
                        <img src="{{ asset($bannerlist->slide_two) }}" class="d-block w-100" alt="{{ asset($bannerlist->slide_two) }}">
                      </div>
                      <div class="carousel-item" data-bs-interval="2000">
                        <img src="{{ asset($bannerlist->slide_three) }}" class="d-block w-100" alt="{{ asset($bannerlist->slide_two) }}">
                      </div>
                      <div class="carousel-item" data-bs-interval="2000">
                        <img src="{{ asset($bannerlist->slide_four) }}" class="d-block w-100" alt="{{ asset($bannerlist->slide_four) }}">
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 d-none d-md-block ">
                <p class="text-secondary"> {!! GoogleTranslate::trans($bannerlist->description, app()->getLocale()) !!} </p>
            </div>
        </div>
    </div>
</div>
