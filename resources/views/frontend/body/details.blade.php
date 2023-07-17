<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <link rel="stylesheet" href="{{ asset('frontend/assets/custom/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

</head>
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
            <div class="gap-1 p-2 col-12 col-md-9">
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
                                <span class="me-3">Category: <a href="#" class="badge brounded-pill bg-secondary text-decoration-none">{{ $news['category']['category_name'] }}</a></span>
                                @if ($news->subcategory_id === NULL)

                                @else
                                    <span class="me-3">Subcategory: <a href="#" class="badge rounded-pill bg-secondary text-decoration-none">{{ $news['subcategory']['subcategory_name'] }}</a></span>
                                @endif
                                <span>
                                    Tags:
                                    @foreach ($tagsall as $tag)
                                        <a href="#" class="text-decoration-none badge rounded-pill bg-secondary">{{ ucwords($tag) }}</a>
                                    @endforeach
                                </span>
                            </div>
                            <div class="mt-5">
                                <h1 class="h3">Comments</h1>
                                <form action="" method="POST">
                                    <textarea name="comment" id="" cols="30" rows="10" class="form-control"></textarea>
                                    <button type="submit" class="mt-3 btn btn-info">Send <i class="fa-solid fa-paper-plane"></i> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2 pt-0 col-md-3 d-none d-md-block ">
                <div class="container-fluid row">
                    <div class="col-12">
                        <img src="https://i.redd.it/36f0hw6io9m21.gif" class=" object-fit-cover" alt="banner"  style="height: 200px;width:100%;">
                    </div>
                    <div class="col-12" style="font-size: 14px;">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src={{ asset("backend/assets/bower_components/jquery/dist/jquery.min.js" )}}></script>
    {{-- <script src={{ asset("backend/assets/bower_components/jquery-ui/jquery-ui.min.js") }}></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    <script src="{{ asset('frontend/assets/custom/js/script.js') }}"></script>

    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','success') }}";
            var positionClass = 'toast-top-custom'; // Define a custom position class
            toastr.options.positionClass = positionClass; // Set the position class

            switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
</body>
</html>
