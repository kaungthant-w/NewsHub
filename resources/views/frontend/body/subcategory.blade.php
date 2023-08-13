<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('logo.png') }}">

    <title>
        @foreach ($subcategories as $subcategory )
            {{GoogleTranslate::trans( $subcategory->subcategory_name , app()->getLocale()) }} {{ GoogleTranslate::trans("News", app()->getLocale()) }}
        @endforeach
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <link rel="stylesheet" href="{{ asset('frontend/assets/custom/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

</head>
<body class="p-0 m-0 container-fluid">

    @include("frontend.body.navbar")

    @include("frontend.body.banner")

    @include("frontend.body.menu")

    <div class="container-fluid">
        <div class="row">
            <div class="gap-1 p-2 col-12 col-md-9">
                <h1 class="h3">
                    @foreach ($subcategories as $subcategory )
                    {{GoogleTranslate::trans( $subcategory->subcategory_name , app()->getLocale()) }} {{ GoogleTranslate::trans("News", app()->getLocale()) }}
                    @endforeach
                </h1>
                <div class="row">
                    @if ($news->isEmpty())
                        <div class="col-12">
                            <div class="alert alert-info text-lowercase">
                                @foreach ($subcategories as $subcategory )
                                {{ GoogleTranslate::trans("There is no", app()->getLocale()) }} {{GoogleTranslate::trans( $subcategory->subcategory_name , app()->getLocale()) }} {{ GoogleTranslate::trans("post.", app()->getLocale()) }}
                                @endforeach
                            </div>
                        </div>
                        @else
                        @foreach ($news as $newsList )
                            <div class="my-3 col-12 col-md-4">
                                <div class="card">
                                    <a href="{{ url('newspost/details/'.$newsList->id."/".$newsList->news_title_slug) }}" class="text-decoration-none text-secondary">
                                        <img class="card-img-top" src="{{asset($newsList->image)}}" alt="{{ $newsList->image }}">
                                        <div class="card-body">
                                            <h1 class="h5">{{ Str::limit($newsList->news_title, 20) }}</h1>
                                            <p class="card-text ">{!! Str::limit(GoogleTranslate::trans($newsList->news_details, app()->getLocale()), 80) !!}</p>
                                            <p>{{ $newsList->created_at->diffForHumans()}}</p>
                                            <a href="{{ url('newspost/details/'.$newsList->id."/".$newsList->news_title_slug) }}" class="text-decoration-none text-primary">{{ GoogleTranslate::trans("ReadMore", app()->getLocale()) }}</a>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="p-2 pt-3 mt-5 col-12 col-md-3">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{ GoogleTranslate::trans("Popular", app()->getLocale()) }}</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> {{ GoogleTranslate::trans("Latest", app()->getLocale()) }}</button>
                    </div>
                </nav>
                <div class="mt-3 tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home">
                        <ul class="nav-item">
                            @foreach ($popularNews as $newsList)
                                <li class="mb-2 nav-link">
                                    <a href="{{ url('newspost/details/'.$newsList->id."/".$newsList->news_title_slug) }}" class="d-flex text-decoration-none">
                                        <img src="{{asset($newsList->image)}}" alt="" class="img-thubnail rounded-circle" style="width:40px;height:40px;">
                                        <p class="ms-2" style="font-size: 12px;">{!! Str::limit(GoogleTranslate::trans($newsList->news_details, app()->getLocale()), 40) !!}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="nav-profile">
                        <ul class="mb-2 nav-item">
                            @foreach ($latestNews as $newsList)
                                <li class="mb-3 nav-link">
                                    <a href="{{ url('newspost/details/'.$newsList->id."/".$newsList->news_title_slug) }}" class="d-flex text-decoration-none">
                                        <img src="{{asset($newsList->image)}}" alt="" class="img-thubnail rounded-circle" style="width:40px;height:40px;">
                                        <p class="ms-2" style="font-size: 12px;">{!! Str::limit(GoogleTranslate::trans($newsList->news_details, app()->getLocale()), 40) !!}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include("frontend.body.category") --}}
    {{-- @include("frontend.body.latest")
    @include("frontend.body.travel") --}}

    @include("frontend.body.modal")

    @include("frontend.body.footer")
