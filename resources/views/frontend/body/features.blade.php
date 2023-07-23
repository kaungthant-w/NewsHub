@php
    use Illuminate\Support\Str;

    $newsTopSliders = App\Models\Admin\Newspost::where('status', '1')->where("top_slider", '1')->get();
    $breakingNewsTop = App\Models\Admin\Newspost::where('status', '1')->where("breaking_news", '1')->inRandomOrder()->first();
    $breakingNewsList = App\Models\Admin\Newspost::where('status', '1')->where("breaking_news", '1')->inRandomOrder()->skip(1)->take(2)->get();
    $newsThreePosts = App\Models\Admin\Newspost::where('status', '1')->where("first_section_three", '1')->get();
    $live = App\Models\Admin\LiveTv::findOrFail(1);

@endphp

<section class="mb-3 container-fluid">
    <div class="mb-5 row">
        <div class="col-12 col-md-6" style="height: 300px">
            @php $active = true; @endphp
            <div id="carouselFeatures" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($newsTopSliders as $newsList)
                        <a href="{{ url('newspost/details/'.$newsList->id.'/'.$newsList->news_title_slug) }}"
                            class="carousel-item @if($active) active @endif" data-bs-interval="5000">
                            <img src="{{ $newsList->image }}" alt="Image 1">
                            <div class="carousel-caption">
                                <h5>{{ Str::limit($newsList->news_title, 20) }}</h5>
                                <p>{!! Str::limit($newsList->news_details, 80) !!}</p>
                                <small>{{ $newsList->created_at->diffForHumans() }}</small>
                            </div>
                        </a>
                        @php $active = false; @endphp
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselFeatures" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselFeatures" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="my-3 col-12 col-md-6 my-md-0 position-relative">
            {{-- <div class="live-item position-absolute top-2 end-3 z-3">
                <div class="live_title">
                    <a href=" ">LIVE TV </a>
                    <div class="themesBazar"></div>
                </div>
                <div class="popup-wrpp">
                    <div class="live_image">
                        <img width="700" height="400" src="{{ asset($live->image) }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy">
                        <div data-mfp-src="#mymodal" class="live-icon modal-live"> <i class="las la-play"></i> </div>
                    </div>
                    <div class="live-popup">
                        <div id="mymodal" class="mfp-hide" role="dialog" aria-labelledby="modal-titles" aria-describedby="modal-contents">
                            <div id="modal-contents">
                                <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                <iframe class="" src=" " allowfullscreen="allowfullscreen" width="100%" height="400px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div> --}}

            <div class="row g-1">
                <a href="{{ url('newspost/details/'.$breakingNewsTop->id."/".$breakingNewsTop->news_title_slug) }}" class="mb-4 mb-md-0 col-12 position-relative" style="height:150px">
                    <div class="image-frontendoverlay">
                        <img src="{{ $breakingNewsTop->image }}" class="object-fit-cover w-100" style="height: 150px" alt="">
                        <div class="overlay"></div>
                        <div class="image-caption">
                            <p class="mt-2 mt-md-1">{!! Str::limit($breakingNewsTop->news_details, 80) !!}</p>
                        </div>
                    </div>
                </a>

                @foreach ($breakingNewsList as $newsThreePost )
                <a href="{{ url('newspost/details/'.$newsThreePost->id."/".$newsThreePost->news_title_slug) }}" class="mb-5 mb-md-0 col-12 col-md-6 position-relative" style="height: 150px">
                    <div class="text-center image-frontendoverlay">
                        <img src="{{ $newsThreePost -> image }}" class="object-fit-cover w-100" style="height:150px;"  alt="">
                        <div class="overlay"></div>
                        <div class="image-caption">
                            <p class="mt-2 mt-md-1">{!! Str::limit($newsThreePost->news_details, 60) !!}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>

        </div>
    </div>

</section>




