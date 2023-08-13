@php
    $user = Illuminate\Support\Facades\Auth::user();
    $id = $user ? $user->id : null;
    $userData = $id ? App\Models\User::find($id) : null;
    $adminData = $user && $user->isAdmin() ? $userData : null;
@endphp

<nav class="shadow-sm opacity-75 navbar navbar-expand-lg navbar-light z-2" id="navHeader">
    <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-around ms-2 ms-md-0" id="navbarSupportedContent">
        <ul class="mt-4 d-flex justify-content-center mt-md-2 align-items-center ">
            <li class="list-unstyled"> <a href="{{ url('/') }}"><img src="{{ asset('logo.png') }}" class="nav-link text-decoration-none me-2" alt="" style="width:35px;height:35px;"></a> </li>
            <li class="list-unstyled"> <a class="nav-link text-decoration-none me-2" href="https://www.facebook.com/profile.php?id=100077645595500&mibextid=ZbWKwL" target="_blank" title="facebook"><i class="text-white fa-brands fa-facebook"></i> </a> </li>
            <li class="list-unstyled"><a class="nav-link text-decoration-none me-2" href="https://twitter.com/ForbesEDU?s=09" target="_blank" title="twitter"><i class="text-white fa-brands fa-twitter"></i></a> </li>
        </ul>
        <div class="nav-item col-5 col-md-3 ms-3 ms-md-0">
            <form action="{{ route('news#search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder=" {{ GoogleTranslate::trans('Enter your post title', app()->getLocale()) }}">
                    <button class="ml-0 btn btn-danger ml-md-3"><i class="fa-solid fa-magnifying-glass"></i> </button>
                </div>
            </form>
        </div>
        <ul class="navbar-nav ms-3">
            <li class="nav-item ms-md-0 me-md-2"><a href="#" id="dark-mode-toggle" class="nav-link text-dark text-decoration-none" > <i class="fa-solid fa-moon fw-bold"></i> </a> </li>
            <li class="mt-1 nav-item ms-md-0 me-md-2 col-3">
                <select name="" id="changeLang" class=" form-select form-select-sm changeLang">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>{{ GoogleTranslate::trans('English', app()->getLocale()) }}</option>
                    <option value="zh-CN" {{ session()->get('locale') == 'zh-CN' ? 'selected' : '' }}>{{ GoogleTranslate::trans('China', app()->getLocale()) }}</option>
                    <option value="my" {{ session()->get('locale') == 'my' ? 'selected' : '' }}>{{ GoogleTranslate::trans('Myanmar', app()->getLocale()) }}</option>
                    <option value="th" {{ session()->get('locale') == 'th' ? 'selected' : '' }}>{{ GoogleTranslate::trans('Thailand', app()->getLocale()) }}</option>
                    <option value="hi" {{ session()->get('locale') == 'hi' ? 'selected' : '' }}>{{ GoogleTranslate::trans('India', app()->getLocale()) }}</option>
                    <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>{{ GoogleTranslate::trans('French', app()->getLocale()) }}</option>

                </select>
            </li>

            @guest
                <li class="nav-item me-md-2"><a class="px-3 text-white nav-link text-decoration-none" href="#loginId" data-bs-toggle="modal">{{ GoogleTranslate::trans('Login', app()->getLocale()) }}</a> </li>
                <li class="nav-item"><a class="px-3 text-white nav-link text-decoration-none"  href="#registerId" data-bs-toggle="modal"></i>{{ GoogleTranslate::trans('Register', app()->getLocale()) }}</a> </li>
            @endguest

            @auth
                <li class="nav-item dropdown">
                    @if($adminData)
                        <a href="#" class="text-white nav-link text-decoration-none fw-bold"    id="dropdownMenuButton" data-bs-toggle="dropdown">
                            <img src="{{ (!empty($adminData->photo)) ? url('backend/assets/dist/img/admin_profile/'.$adminData->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" class=" rounded-circle profile-img" style="width: 25px;height:25px" alt="$adminData->photo">
                            {{ Auth::user()->name }}
                            <div class="dropdown-menu me-md-4">
                                <a class="dropdown-item" href="{{ route('admin#dashboard') }}">{{ GoogleTranslate::trans('Your Dashboard', app()->getLocale()) }}</a>
                                <a class="dropdown-item" href="{{ route('admin#profile') }}">{{ GoogleTranslate::trans('Your Profile', app()->getLocale()) }}</a>
                                <a class="dropdown-item" href="{{ route('admin#change#password') }}">{{ GoogleTranslate::trans('Change Password ', app()->getLocale()) }}</a>
                            </div>
                        </a>

                    @else
                        <a href="#" class="text-white nav-link text-decoration-none fw-bold" id="dropdownMenuButton" data-bs-toggle="dropdown">
                            <img src="{{ (!empty(Auth::user()->photo)) ? url('frontend/assets/images/userprofile/'.Auth::user()->photo):url('frontend/assets/images/userprofile/no_image.jpg') }}" class=" rounded-circle profile-img" style="width: 25px;height:25px" alt="Auth::user()->photo">
                            {{ Auth::user()->name }}
                            <div class="dropdown-menu me-md-4">
                                <a class="dropdown-item" href="{{ route('user#frontend#dashboard') }}">{{ GoogleTranslate::trans('Your Profile', app()->getLocale()) }}</a>
                                <a class="dropdown-item" href="{{ route('user#change#password') }}">{{ GoogleTranslate::trans('Change Password', app()->getLocale()) }}</a>
                            </div>
                        </a>
                    @endif
                </li>


                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="nav-item fw-bold mt-2">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-danger text-decoration-none">
                            {{ GoogleTranslate::trans(__('Log Out'), app()->getLocale()) }}
                        </x-dropdown-link>
                    </form>
                </li>
                </ul>
            @endauth
        </ul>
    </div>
</nav>

