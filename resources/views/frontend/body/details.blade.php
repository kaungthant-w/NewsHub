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
        $bannerlist = App\Models\Admin\Banner::findOrFail(1);
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
                    <div class="mt-4 col-12" style="height: 200px">
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
                    <div class="mt-2 col-12" style="font-size: 14px;">
                        <p>{!! $bannerlist->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("frontend.body.relative_news")

    @include("frontend.body.travel")

    @include("frontend.body.footer")

    @include("frontend.body.modal")
