@php
    use Illuminate\Support\Str;
    $newsThreePosts = App\Models\Admin\Newspost::where("first_section_three", '1')->inRandomOrder()->get();
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="gap-1 p-2 col-12 col-md-9">
            <div class="row">
                @foreach ($newsThreePosts as $newsList )
                    <div class="my-3 col-12 col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="{{$newsList->image}}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{ Str::limit($newsList->news_details, 80) }}</p>
                                <p>{{ $newsList->created_at->diffForHumans()}}</p>
                                <a href="#" class="btn btn-outline-primary">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-12 col-md-3">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Popular</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Latest</button>
                </div>
            </nav>
            <div class="mt-3 tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home">
                    <ul class="nav-item">
                        @foreach ($newsThreePosts as $newsList)
                            <li class="nav-link">
                                <div class="d-flex">
                                    <img src="{{$newsList->image}}" alt="" class="img-thubnail rounded-circle" style="width:40px;height:40px;">
                                    <p class="ms-2" style="font-size: 12px;">{{ Str::limit($newsList->news_details, 40) }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-pane fade" id="nav-profile">
                    <ul class="nav-item">
                        @foreach ($newsThreePosts as $newsList)
                            <li class="nav-link">
                                <div class="d-flex">
                                    <img src="{{$newsList->image}}" alt="" class="img-thubnail rounded-circle" style="width:40px;height:40px;">
                                    <p class="ms-2" style="font-size: 12px;">{{ Str::limit($newsList->news_details, 40) }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
