@php
    $categories = App\Models\Admin\Category::inRandomOrder()->take(6)->get();
    $subcategories = App\Models\Admin\Subcategory::inRandomOrder()->take(6)->get();
    $newsList = App\Models\Admin\Newspost::inRandomOrder()->take(6)->get();
    // $categorySport = App\Models\Admin\Category::where('category_name', 'SPORTS')->get();
    $categoryEntertament = App\Models\Admin\Category::where('category_name', 'ENTERTAINMENT')->get();
@endphp
<div class="container pt-4 my-5 border-spacing-8 border-top">
    <div class="row">
        <div class="mt-4 col-12 col-md-4">
            <h1 class="h4">Categories</h1>
            <ul class="navbar-nav">
                @foreach ($categories as $category)
                <li class="nav-item">
                    <a href="{{ url('newspost/category/'.$category->id."/".$category->category_slug) }}" class="nav-link border-bottom">
                        {{ $category->category_name }}
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
        <div class="mt-4 col-12 col-md-4">
            <h1 class="h4">Subcategories</h1>
            <ul class="navbar-nav">
                @foreach ($subcategories as $subcategory)
                <li class="nav-item">
                    <a href="{{ url('newspost/subcategory/'.$subcategory->id."/".$subcategory->subcategory_slug) }}" class="nav-link border-bottom">{{ $subcategory -> subcategory_name }}</a>
                </li>
                @endforeach

            </ul>
        </div>
        <div class="mt-4 col-12 col-md-4">
        <h1 class="h4">News</h1>
            <ul class="navbar-nav">
                @foreach ($newsList as $news)
                <li class="nav-item">
                    <a href="{{ url('newspost/details/'.$news->id."/".$news->news_title_slug) }}" class=" nav-link border-bottom">{{ $news->news_title }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <p class="my-3 text-center">&copy
        <script>
          document.write(new Date().getFullYear());
        </script>
        Created By <a href="https://www.kyawmyothant.com" class="text-decoration-none" target="_blank">Kyaw Myo Thant</a> | All Rights Reserved
    </p>
</div>

{{-- <script src={{ asset("backend/assets/bower_components/jquery/dist/jquery.min.js" )}}></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.slim.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
{{-- <script src={{ asset("backend/assets/bower_components/jquery-ui/jquery-ui.min.js") }}></script> --}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset("frontend/assets/custom/js/script.js") }}"></script>
{{-- <script src="{{ asset('frontend/assets/js/index.js ') }}" id="contact-form-7-js"></script> --}}
{{-- <script src="{{asset('frontend/assets/js/jquery-3.5.1.min.js')}}" id="newsflash-jquery-js"></script> --}}
{{-- <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}" id="newsflash-bootstrap-js"></script> --}}
{{-- <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}" id="newsflash-bootstrapbundle-js"></script> --}}
{{-- <script src="{{asset('frontend/assets/js/stellarnav.min.js')}}" id="newsflash-stellarnav-js"></script>
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}" id="newsflash-carousel-js"></script>
<script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}" id="newsflash-magnific-js"></script>
<script src="{{asset('frontend/assets/js/jquery-ui.js')}}" id="newsflash-jqueryui-js"></script>
<script src="{{asset('frontend/assets/js/lazyload.min.js')}}" id="newsflash-lazyload-js"></script> --}}
{{-- <script src="{{asset('frontend/assets/js/main.js')}}" id="newsflash-main-js"></script> --}}
{{-- <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}" id="newsflash-main-js"></script> --}}

{{-- for fotorama effect --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.min.js"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
{{-- <script src="{{asset('frontend/assets/js/jquery.lbt-lightbox.min.js')}}"></script> --}}
<script src="{{asset('frontend/assets/js/jquery.lightbox.js')}}"></script>
<script src="{{ asset('frontend/assets/js/KBmodal.js') }}"></script>

<script src="https://unpkg.com/draggabilly/dist/draggabilly.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/draggabilly/draggabilly.min.js"></script>

{{-- <script src="{{ asset('frontend/assets/js/gulpfile.js') }}"></script> --}}
<script>

    (function($){
        $(document).ready(function(){
        var galLink = $("a.gal_link");
        galLink.lightbox();

    });

    })(jQuery);

    var draggable =new Draggabilly('.draggable');


</script>


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
</body>
</html>
