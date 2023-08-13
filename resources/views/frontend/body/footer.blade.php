@php
    $categories = App\Models\Admin\Category::inRandomOrder()->take(6)->get();
    $subcategories = App\Models\Admin\Subcategory::inRandomOrder()->take(6)->get();
    $newsList = App\Models\Admin\Newspost::inRandomOrder()->take(6)->get();
    $categoryEntertament = App\Models\Admin\Category::where('category_name', 'ENTERTAINMENT')->get();
@endphp
<div class="container pt-4 my-5 border-spacing-8 border-top">
    <div class="row">
        <div class="mt-4 col-12 col-md-4">
            <h1 class="h4">{{ GoogleTranslate::trans("Categories", app()->getLocale()) }}</h1>
            <ul class="navbar-nav">
                @foreach ($categories as $category)
                <li class="nav-item">
                    <a href="{{ url('newspost/category/'.$category->id."/".$category->category_slug) }}" class="nav-link border-bottom">
                        {{ GoogleTranslate::trans($category->category_name, app()->getLocale()) }}
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
        <div class="mt-4 col-12 col-md-4">
            <h1 class="h4">{{ GoogleTranslate::trans("Subcategories", app()->getLocale()) }}</h1>
            <ul class="navbar-nav">
                @foreach ($subcategories as $subcategory)
                <li class="nav-item">
                    <a href="{{ url('newspost/subcategory/'.$subcategory->id."/".$subcategory->subcategory_slug) }}" class="nav-link border-bottom"> {{ GoogleTranslate::trans($subcategory ->subcategory_name, app()->getLocale()) }}</a>
                </li>
                @endforeach

            </ul>
        </div>
        <div class="mt-4 col-12 col-md-4">
        <h1 class="h4">{{ GoogleTranslate::trans("News", app()->getLocale()) }}</h1>
            <ul class="navbar-nav">
                @foreach ($newsList as $news)
                <li class="nav-item">
                    <a href="{{ url('newspost/details/'.$news->id."/".$news->news_title_slug) }}" class=" nav-link border-bottom">{{ GoogleTranslate::trans($news->news_title, app()->getLocale()) }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <p class="my-3 text-center">&copy
        <script>
          document.write(new Date().getFullYear());
        </script>
        {{ GoogleTranslate::trans("Created By", app()->getLocale()) }} <a href="https://www.kyawmyothant.com" class="text-decoration-none" target="_blank">Kyaw Myo Thant</a> | {{ GoogleTranslate::trans("All Rights Reserved", app()->getLocale()) }}
    </p>
    <p class="my-3 text-center"><a class="text-decoration-none " href="{{ route('news#policy') }}">{{ GoogleTranslate::trans("Privacy Policy ", app()->getLocale()) }}</a> {{ GoogleTranslate::trans("Privacy for NewsHub ", app()->getLocale()) }} </p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset("frontend/assets/custom/js/script.js") }}"></script>
<script src="{{asset('frontend/assets/js/jquery.lightbox.js')}}"></script>
<script src="{{ asset('frontend/assets/js/KBmodal.js') }}"></script>

<script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
        }
    @endif
</script>

<script>
    var url = "{{ route('changeLang') }}";
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+$(this).val();
    })
</script>

</body>
</html>
