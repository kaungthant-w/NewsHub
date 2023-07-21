@php
    use Illuminate\Support\Str;
    $travelNewsTop = App\Models\Admin\Newspost::where('status', '1')->where("category_id", '78')->inRandomOrder()->first();
    $travelNewsList = App\Models\Admin\Newspost::where('status', '1')->where("category_id", '78')->inRandomOrder()->skip(1)->take(3)->get();
@endphp

<section class="my-5 container-fluid">
    <div class="mb-5 row">
        <h1 class="h3">Travels News</h1>
        <a href="{{ url('newspost/details/'.$travelNewsTop->id."/".$travelNewsTop->news_title_slug) }}" class="col-12 col-md-6 text-decoration-none">
            <img src="{{ asset($travelNewsTop->image) }}" alt="" class="img-thumbnail">
            <p class="text-secondary">{!! Str::limit($travelNewsTop->news_details, 200) !!}</p>
        </a>
        <div class="col-12 col-md-6">
            <div class="row">
                @foreach ($travelNewsList as $newsList)
                    <a href="{{ url('newspost/details/'.$newsList->id."/".$newsList->news_title_slug) }}" class="mb-3 d-flex text-decoration-none">
                        <img src="{{ asset($newsList->image) }}" class="img-thumbnail" style="height:7rem;width:10rem" alt="">
                        <p class="ms-3 text-secondary">{!! Str::limit($newsList->news_details, 100) !!}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
