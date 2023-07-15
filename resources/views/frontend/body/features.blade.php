@php
    use Illuminate\Support\Str;

    $newsFeatures = App\Models\Admin\Newspost::where("breaking_news", '1')->get();
    $newsTopSliders = App\Models\Admin\Newspost::where("top_slider", '1')->get();
    $newsThreePosts = App\Models\Admin\Newspost::where("first_section_three", '1')->get();
@endphp

<section class="container-fluid">
    <div class="mb-5 row">
        <div class="col-12 col-md-6" style="height: 300px">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ( $newsFeatures as $newslist)
                        <div class="carousel-item active">
                            <img src="{{ $newslist -> image }}" alt="Image 1">
                            <div class="carousel-caption">
                                <h5>{{ $newslist -> news_title }}</h5>
                                <p>{{ Str::limit($newslist->news_details, 80) }}</p>
                                <small>{{ $newslist -> created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="my-3 col-12 col-md-6 my-md-0" style="height: 300px">
            <div class="row g-1">
                    @foreach ( $newsTopSliders as $newslist)
                    <div class="col-12 position-relative" style="height:150px">
                        <div class="image-frontendoverlay">
                            <img src="{{ $newslist->image }}" class="object-fit-cover w-100" style="height: 150px" alt="">
                            <div class="overlay"></div>
                            <div class="image-caption">
                                <p>{{ Str::limit($newslist->news_details, 80) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @foreach ($newsThreePosts as $newsThreePost )
                    <div class="col-12 col-md-6" style="height: 150px">
                        <div class="text-center "><img src="{{ $newsThreePost -> image }}" class="object-fit-cover w-100" style="height:150px;"  alt=""></div>
                        <div class="text-sm ms-0" style="font-size: 13px">
                            <p>{{ Str::limit($newsThreePost->news_details, 40) }} </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


    </div>
</section>
