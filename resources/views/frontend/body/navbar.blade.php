<nav class="shadow-sm opacity-75 navbar navbar-expand-lg navbar-light" id="navHeader">
    <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-around ms-2 ms-md-0" id="navbarSupportedContent">
        <ul class="mt-4 d-flex mt-md-2">
            <li class="list-unstyled"> <a class="nav-link text-decoration-none me-2" href="#" target="_blank" title="facebook"><i class="text-white fa-brands fa-facebook"></i> </a> </li>
            <li class="list-unstyled"><a class="nav-link text-decoration-none me-2" href="#" target="_blank" title="twitter"><i class="text-white fa-brands fa-twitter"></i></a> </li>
            <li class="list-unstyled"><a class="nav-link text-decoration-none me-2" href="#" target="_blank" title="instagram"><i class="text-white fa-brands fa-instagram"></i></a> </li>
        </ul>
        <div class="nav-item col-8 col-md-3 ms-3 ms-md-0">
            <form action="#">
                <div class="input-group">
                    <input type="text" name="post" class="form-control" placeholder="Enter your post title">
                    <button class="ml-0 btn btn-danger ml-md-3"><i class="fa-solid fa-magnifying-glass"></i> </button>
                </div>
            </form>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item ms-3 ms-md-0 me-md-2"><a href="#" id="dark-mode-toggle" class="nav-link text-dark text-decoration-none" > <i class="fa-solid fa-moon fw-bold"></i> </a> </li>

            @guest
                <li class="nav-item me-md-2"><a class="px-3 text-white nav-link text-decoration-none" href="#loginId" data-bs-toggle="modal"><i class="fa-thin fa-arrow-right-from-bracket"></i> Login</a> </li>
                <li class="nav-item"><a class="px-3 text-white nav-link text-decoration-none"  href="#registerId" data-bs-toggle="modal"></i>Register</a> </li>
            @endguest

            @auth
                <li class="nav-item"><a href="{{ route('user#frontend#dashboard') }}" class="text-white nav-link text-decoration-none fw-bold" ><i class="fa-solid fa-user"></i> {{ Auth::user()->name }}</a> </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="nav-item fw-bold">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" class="nav-link text-danger">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </li>
                </ul>
            @endauth
        </ul>
    </div>
</nav>
