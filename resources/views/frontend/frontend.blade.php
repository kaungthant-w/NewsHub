@php
    $live = App\Models\Admin\LiveTv::findOrFail(1);
@endphp

<div class=" card LiveTV col-8 col-md-3 z-3 draggable">
    <div class="justify-content-between d-flex card-header hoverLiveTV">
        <div>
            <span class="text-sm spinner-grow text-danger spinner-grow-sm">
            </span>
            <span>{{ GoogleTranslate::trans("Live TV", app()->getLocale()) }}</span>
        </div>
        <div class="closeLive">
            <button class=" btn btn-default">
                X
            </button>
        </div>
    </div>
    <div class="card-body position-relative" data-bs-toggle="modal" data-bs-target="#liveModal">
        <div class=" position-absolute top-50 end-50 translate-middle">
            <i class="text-white fa-solid fa-play fs-2"></i>
        </div>
        <img src="{{ $live->image }}" class="w-100 img-thumbnail" style="height: 200px" alt="{{ $live->image }}">
    </div>
</div>

<!--Live TV Modal -->
<div class=" modal fade" id="liveModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ GoogleTranslate::trans("Live TV", app()->getLocale()) }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <iframe height="315" class="w-100" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen src="{{ $live->url }}">
            </iframe>
        </div>
      </div>
    </div>
</div>

@include("frontend.body.header")
<body class="p-0 m-0 container-fluid">
    @include("frontend.body.navbar")
    @include("frontend.body.banner")
    @include("frontend.body.menu")
    @include("frontend.body.features")
    @include("frontend.body.latest")
    @include("frontend.body.travel")
    @include("frontend.body.gallery")
    @include("frontend.body.video")
    @include("frontend.body.footer")
    @include("frontend.body.modal")


<script src="https://unpkg.com/draggabilly/dist/draggabilly.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/draggabilly/draggabilly.min.js"></script>

<script>

    (function($){
        $(document).ready(function(){
        var galLink = $("a.gal_link");
        galLink.lightbox();

    });

    })(jQuery);

    var draggable =new Draggabilly('.draggable');

    //live
    $(document).ready(function() {
        $(".closeLive").on("click", function() {
        $(this).closest(".card").hide();
        });
    });

</script>
