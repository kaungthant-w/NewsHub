@include("frontend.body.header")
<body class="p-0 m-0 container-fluid">

    @include("frontend.body.navbar")

    {{-- @include("frontend.body.banner") --}}

    @include("frontend.body.menu")

    @php
        use Illuminate\Support\Str;
        $newsThreePosts = App\Models\Admin\Newspost::where('status', '1')->where("first_section_three", '1')->inRandomOrder()->get();
        $travelNewsTop = App\Models\Admin\Newspost::where('status', '1')->where('status', '1')->where("category_id", '78')->inRandomOrder()->first();
        $travelNewsList = App\Models\Admin\Newspost::where('status', '1')->where("category_id", '78')->inRandomOrder()->skip(1)->take(3)->get();
    @endphp
    <div class="container-fluid">
        <div class="row">
            <div class="gap-1 p-2 col-12 col-md-8 col-lg-9">
                <div class="row">
                    <div class="my-3 col-12">
                        <div class="position-relative">
                            <img class="card-img-top" src="{{asset($news->image)}}" alt="{{ $news->image }}">
                            <p class="top-0 mt-3 position-absolute end-0 me-3" style="color: gray; font-size:12px; "><i class="fa fa-eye"></i> {{ $news -> view_count }}</p>
                        </div>
                        <div class="p-3">
                            <h1 class=" h4 ms-2">{{ $news->news_title }}</h1>
                            <p style="font-size: 14px;color:gray" class="ms-2">{{ $news->created_at->diffForHumans()}}</p>
                            <div class="">
                                <span style="font-size: 14px;color:gray" class="ms-2">Posted By <i class="fa fa-user"></i> <a href="#" class="text-decoration-none text-secondary">{{ $news['user']['name'] }}</a></span>
                            </div>
                            <p class="card-text" style="color:gray">{!! $news->news_details !!}</p>

                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <span class="me-3">Category:
                                            <a href="" class="badge brounded-pill bg-secondary text-decoration-none">{{ $news['category']['category_name'] }}</a>
                                        </span>

                                        {{-- @foreach ($categories as $category)
                                        <li class="nav-item">
                                            <a href="{{ url('newspost/category/'.$category->id."/".$category->category_slug) }}" class="nav-link border-bottom">
                                                {{ $category->category_name }}
                                            </a>
                                        </li>
                                        @endforeach --}}
                                    </div>
                                    <div class="col-12 col-md-3">
                                        @if ($news->subcategory_id === NULL)

                                        @else
                                            <span class="me-3">Subcategory: <a href="#" class="badge rounded-pill bg-secondary text-decoration-none">{{ $news['subcategory']['subcategory_name'] }}</a></span>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <span>
                                            Tags:
                                            @foreach ($tagsall as $tag)
                                                <a href="#" class="text-decoration-none badge rounded-pill bg-secondary">{{ ucwords($tag) }}</a>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h1 class="h3">Comments</h1>
                                <form action="" method="POST">
                                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                                    <button type="submit" class="mt-3 btn btn-info">Send <i class="fa-solid fa-paper-plane"></i> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 pt-0 mt-5 col-md-12 mt-lg-0 col-lg-3">
                <div class="container-fluid row">
                    {{-- <div class="col-12">
                        <img src="https://i.redd.it/36f0hw6io9m21.gif" class=" object-fit-cover" alt="banner"  style="height: 200px;width:100%;">
                    </div> --}}
                    <div class="mt-4 col-12" style="height: 200px">
                        <div id="bannerSlider" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active" data-bs-interval="3000">
                                <img src="https://prod-upp-image-read.ft.com/75e8de86-49b1-11ea-aeb3-955839e06441" class="object-fit-cover" style="height: 200px;width:100%;" alt="https://prod-upp-image-read.ft.com/75e8de86-49b1-11ea-aeb3-955839e06441">
                              </div>
                              <div class="carousel-item" data-bs-interval="2000">
                                <img src="https://www.teslarati.com/wp-content/uploads/2019/06/tesla-model-3-supercharger.jpg" class="object-fit-cover" style="height: 200px;width:100%;" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="https://www.usatoday.com/gcdn/-mm-/f4c4c3d8d99ab9a0fd37e8d3d494112eb6c0c801/c=0-0-580-326/local/-/media/2017/10/24/USATODAY/usatsports/tsla-q3-earnings_large.png" class="object-fit-cover" style="height: 200px;width:100%;" alt="...">
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="mt-2 col-12" style="font-size: 14px;">
                        <p>Tesla, founded by Elon Musk in 2003, is a leading electric vehicle (EV) and clean energy company. It has revolutionized the automotive industry with its innovative electric cars, pushing the boundaries of technology and sustainability.</p>
                        <p>Tesla's Model S, Model 3, Model X, and Model Y are popular electric vehicles known for their impressive range, acceleration, and advanced Autopilot features.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("frontend.body.relative_news")

    @include("frontend.body.travel")

    @include("frontend.body.footer")

    @include("frontend.body.modal")
