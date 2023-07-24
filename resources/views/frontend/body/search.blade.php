@section('title')
    @foreach ($news as $new)
        {{ $new->news_title }}
    @endforeach
@endsection


@include("frontend.body.header")

<body class="p-0 m-0 container-fluid">

    @include("frontend.body.navbar")

    @include("frontend.body.menu")

    @php
        use Illuminate\Support\Str;
        $newsThreePosts = App\Models\Admin\Newspost::where('status', '1')->where("first_section_three", '1')->inRandomOrder()->get();
        $travelNewsTop = App\Models\Admin\Newspost::where('status', '1')->where('status', '1')->where("category_id", '78')->inRandomOrder()->first();
        $travelNewsList = App\Models\Admin\Newspost::where('status', '1')->where("category_id", '78')->inRandomOrder()->skip(1)->take(3)->get();
        $bannerlist = App\Models\Admin\Banner::findOrFail(1);
    @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="gap-1 p-2 col-12 col-md-8 col-lg-9">
                <div class="row">
                    @if ($news->isEmpty())
                        @foreach ($news as $newsList )
                        <div class="my-3 col-12 col-md-4">
                            <div class="card">
                                <img class="card-img-top" src="{{asset($newsList->image)}}" alt="{{ $newsList->image }}">
                                <div class="card-body">
                                    <p class="card-text ">{!! Str::limit($newsList->news_details, 80) !!}</p>
                                    <p>{{ $newsList->created_at->diffForHumans()}}</p>
                                    <a href="{{ url('newspost/details/'.$newsList->id."/".$newsList->news_title_slug) }}" class="text-decoration-none text-primary">ReadMore</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h3 class="mt-3 text-center text-danger">There is no search post.</h3>
                    @endif

                </div>
            </div>
            <div class="p-2 pt-0 mt-5 col-md-12 mt-lg-0 col-lg-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="my-4 col-12" style="height: 200px">
                            <div id="bannerSlider" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                  <div class="carousel-item active" data-bs-interval="3000">
                                    <img src="{{ asset($bannerlist->slide_one) }}" class="d-block w-100" style="height: 200px;" alt="{{ $bannerlist->slide_one }}">
                                  </div>
                                  <div class="carousel-item" data-bs-interval="2000">
                                    <img src="{{ asset($bannerlist->slide_two) }}" class="d-block w-100" style="height: 200px;" alt="{{ $bannerlist->slide_two }}">
                                  </div>
                                  <div class="carousel-item" data-bs-interval="3000">
                                    <img src="{{ asset($bannerlist->slide_three) }}" class="d-block w-100" style="height: 200px;" alt="{{ $bannerlist->slide_three }}">
                                  </div>
                                  <div class="carousel-item" data-bs-interval="3000">
                                    <img src="{{ asset($bannerlist->slide_four) }}" class="d-block w-100" style="height: 200px;" alt="{{ $bannerlist->slide_four }}">
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-none d-md-block" style="font-size: 14px;">
                            <p>{!! $bannerlist->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include("frontend.body.relative_news") --}}

    @include("frontend.body.travel")
    @include("frontend.body.gallery")
    @include("frontend.body.video")
    @include("frontend.body.footer")

    @include("frontend.body.modal")
