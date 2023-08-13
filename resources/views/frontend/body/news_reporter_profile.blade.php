@extends('frontend.profile.index')
@section("content")
    <div class="p-2 container-fluid">
        <h3 class="my-2">{{ GoogleTranslate::trans("Reporter Profile", app()->getLocale()) }}</h3>
        <div class="mt-2 row">
            <div class="mt-2 mt-md-3 col-12 col-md-4">
                <div class="card">
                    <div class="text-center card-title">
                        <h5 class="mt-3">{{ $newsreporter->name }}</h5>
                        <div>{{ $newsreporter->email }}</div>
                        <div>{{ $newsreporter->phone }}</div>
                    </div>

                    <div class="card-body">

                        <div class="flex items-center justify-center">
                            <img src="{{ (!empty($newsreporter->photo)) ? url('backend/assets/dist/img/admin_profile/'.$newsreporter->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" class="p-3 rounded-2 w-100" onclick="showFullSize()" id="showImage" alt="">
                        </div>

                        <div class="image-overlay">
                            <span class="close-btn" onclick="closeFullSize()">&times;</span>
                            <img src="{{ (!empty($newsreporter->photo)) ? url('backend/assets/dist/img/admin_profile/'.$newsreporter->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" alt="Image" class="clickable-img " style="width: 80%;height:80%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 order-md-first">
                <div class="row">
                    @if ($news -> isEmpty())
                        <h1>{{ GoogleTranslate::trans("There is no reporter post.", app()->getLocale()) }}</h1>
                    @else
                        @foreach ($news as $newsList )
                            <div class="my-3 col-12 col-md-4">
                                <a href="{{ url('newspost/details/'.$newsList->id."/".$newsList->news_title_slug) }}" class=" text-decoration-none text-secondary">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset($newsList->image) }}" alt="">
                                        <div class="card-body">
                                            <p class="card-text">{!! Str::limit({{ GoogleTranslate::trans($newsList->news_details, app()->getLocale()) }}, 50) !!}</p>
                                            <p>{{ $newsList->created_at->diffForHumans() }}</p>
                                            <a href="{{ url('newspost/details/'.$newsList->id."/".$newsList->news_title_slug) }}" class="text-decoration-none text-primary">{{ GoogleTranslate::trans("ReadMore", app()->getLocale()) }}</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
