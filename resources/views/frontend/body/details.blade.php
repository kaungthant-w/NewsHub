@section('title')
    {{ GoogleTranslate::trans( $news->news_title , app()->getLocale())  }}
@endsection
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
                            <p class="top-0 mt-3 position-absolute end-0 me-3" style="color: gray; font-size:12px; "><i class="fa fa-eye"></i> {{ GoogleTranslate::trans($news -> view_count, app()->getLocale()) }} </p>
                        </div>
                        <div class="p-3">
                            <h1 class=" h4 ms-2">{{ GoogleTranslate::trans( $news->news_title, app()->getLocale()) }}</h1>
                            <p style="font-size: 14px;color:gray" class="ms-2">{{ $news->created_at->diffForHumans()}}</p>
                            <div class="">
                                <span style="font-size: 14px;color:gray" class="ms-2"> {{ GoogleTranslate::trans("Posted By ", app()->getLocale()) }}<i class="fa fa-user"></i> <a href="{{ route('news#reporter#profile', $news->user_id) }}" class="text-decoration-none text-secondary">{{ GoogleTranslate::trans($news['user']['name'] , app()->getLocale()) }}</a></span>
                            </div>
                            <p class="card-text" style="color:gray">{!! GoogleTranslate::trans($news->news_details , app()->getLocale()) !!}</p>

                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <span class="me-3">{{ GoogleTranslate::trans("Category", app()->getLocale()) }}:
                                            <a href="" class="badge brounded-pill bg-secondary text-decoration-none">{{ GoogleTranslate::trans($news['category']['category_name'] , app()->getLocale()) }}</a>
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
                                            <span class="me-3">{{  GoogleTranslate::trans("Subcategory", app()->getLocale())  }}: <a href="#" class="badge rounded-pill bg-secondary text-decoration-none">{{ GoogleTranslate::trans($news['subcategory']['subcategory_name'] , app()->getLocale()) }}</a></span>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <span>
                                            Tags:
                                            @foreach ($tagsall as $tag)
                                                <a href="#" class="text-decoration-none badge rounded-pill bg-secondary">{{ ucwords(GoogleTranslate::trans($tag, app()->getLocale())) }}</a>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="my-3">
                                @php
                                    $reviews = App\Models\User\Review::where('news_id', $news->id)->latest()->limit(5)->get();
                                @endphp
                                <h3 class="h3">{{ GoogleTranslate::trans("Comments" , app()->getLocale()) }}</h3>
                                @if ($reviews->isEmpty())
                                    <p class="text-danger">{{ GoogleTranslate::trans("There are no comments yet. " , app()->getLocale()) }}</p>
                                @else
                                    @foreach ( $reviews as $review )
                                        @if ($review->status == 0)

                                        @else
                                        <div class="my-3 border-bottom ">
                                            <div class="row">
                                                <div class="col-12 col-md-1">
                                                    <div class="mb-2">
                                                        <img src="{{ asset("frontend/assets/images/userprofile/" . ($review->user->photo ?? 'backend/assets/images/userprofile/no_image.jpg')) }}" onclick="showFullSize()" id="showImage" alt="{{ $review->user->photo }}" style="width: 70px;border-radius:100%;object-fit:cover;" class="img-thumbnail">
                                                    </div>

                                                    <div class="image-overlay">
                                                        <span class="close-btn" onclick="closeFullSize()">&times;</span>
                                                        <img src="{{ asset("frontend/assets/images/userprofile/" . ($review->user->photo ?? 'backend/assets/images/userprofile/no_image.jpg')) }}" alt="Image" class="clickable-img " style="width: 80%;height:80%">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3 comment_des ms-2">
                                                        <div class="fw-bold">{{ $review->user->name }}</div>
                                                        <span class="commentText">
                                                            {{ $review->comment }}
                                                        </span>
                                                        <span class="showMore text-info"><a href="#"> {{ GoogleTranslate::trans("More", app()->getLocale()) }}</a></span>
                                                        <span class="showLess text-danger"><a href="#">{{ GoogleTranslate::trans("Less", app()->getLocale()) }}</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                @endif

                                @guest
                                    <p class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> {{ GoogleTranslate::trans("For Add Post Review. You Need to Login First.", app()->getLocale()) }}<a href="#loginId" data-bs-toggle="modal" class="text-decoration-none text-info"> {{ GoogleTranslate::trans("Login", app()->getLocale()) }}</a></p>
                                @else

                                    <div class="mt-5">
                                        <h1 class="h3">Comments</h1>
                                        <form action="{{ route('reviews#store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $news->id }}" name="news_id">
                                            <textarea name="comment" id="comment" cols="30" rows="10" class="form-control"></textarea>
                                            <button type="submit" class="mt-3 btn btn-info"> {{ GoogleTranslate::trans("Send", app()->getLocale()) }}<i class="fa-solid fa-paper-plane"></i> </button>
                                        </form>
                                    </div>

                                @endguest
                            </div>
                        </div>
                    </div>
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
                            <p>{!! GoogleTranslate::trans($bannerlist->description , app()->getLocale()) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("frontend.body.relative_news")

    @include("frontend.body.travel")
    @include("frontend.body.gallery")
    @include("frontend.body.video")
    @include("frontend.body.footer")

    @include("frontend.body.modal")
