@include("frontend.body.header")
<body class="p-0 m-0 container-fluid">
    @include("frontend.body.navbar")
    {{-- @include("frontend.body.banner") --}}

    @include("frontend.body.menu")

    @yield("content")

    @include('frontend.body.footer')
    @include("frontend.body.modal")
