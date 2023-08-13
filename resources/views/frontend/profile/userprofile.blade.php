@extends('frontend.profile.index')
@section("content")
    <div class="mt-5 row g-3">
        <div class="text-center col-12 col-md-4">
            <h3 class="my-3">{{ GoogleTranslate::trans("User Profile", app()->getLocale()) }}</h3>
            <div class="flex items-center justify-center">
                <img src="{{ (!empty($userData->photo)) ? url('frontend/assets/images/userprofile/'.$userData->photo):url('frontend/assets/images/userprofile/no_image.jpg') }}" class="mb-2 rounded-circle profile-img" style="width: 84px;height:84px" onclick="showFullSize()" alt="">
            </div>

            <div class="image-overlay">
                <span class="close-btn" onclick="closeFullSize()">&times;</span>
                <img src="{{ (!empty($userData->photo)) ? url('frontend/assets/images/userprofile/'.$userData->photo):url('frontend/assets/images/userprofile/no_image.jpg') }}" alt="Image" class="clickable-img" style="width: 80%;height:80%">
            </div>

            <h5>{{ $userData->name }}</h5>
            <p class="text-muted">@ {{ $userData->username }}</p>
            <ul class="text-md-start ms-md-5">
                {{-- <li class="list-unstyled">Your Profile</li> --}}
                <li class="list-unstyled"><a href="{{ route('user#change#password') }}" class="text-black text-decoration-none">{{ GoogleTranslate::trans("Change Password", app()->getLocale()) }}</a></li>
                <li class="list-unstyled">{{ GoogleTranslate::trans("Read Later List", app()->getLocale()) }}</li>
                <li class="list-unstyled">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-danger text-decoration-none">
                            {{ GoogleTranslate::trans(__('Log Out'), app()->getLocale()) }}
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
        <div class="p-3 col-12 col-md-6 col-lg-offset-4">
            <h3>{{ GoogleTranslate::trans("Change Account", app()->getLocale()) }}</h3>
            <form action="{{ route("user#profile#store") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group">
                    <label for="">{{ GoogleTranslate::trans("User Name:", app()->getLocale()) }}</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="{{ GoogleTranslate::trans("Your UserName", app()->getLocale()) }}" value="{{ $userData->username }}">
                    @error('username')
                        <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                            {{$message}}
                        </div>
                    @endif
                </div>

                <div class="mb-3 form-group">
                    <label for="">{{ GoogleTranslate::trans("Name:", app()->getLocale()) }}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ GoogleTranslate::trans("Your Name", app()->getLocale()) }}" value="{{ $userData->name }}">
                    @error('name')
                        <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                            {{$message}}
                        </div>
                    @endif
                </div>

                <div class="mb-3 form-group">
                    <label for="">{{ GoogleTranslate::trans("Email:", app()->getLocale()) }}</label>
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" placeholder="{{ GoogleTranslate::trans("Your Email", app()->getLocale()) }}" value="{{ $userData->email }}">
                    @error('email')
                        <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                            {{$message}}
                        </div>
                    @endif
                </div>

                <div class="mb-3 form-group">
                    <label for="">{{ GoogleTranslate::trans("Phone:", app()->getLocale()) }}</label>
                    <input type="number" name="phone" class="form-control  @error('phone') is-invalid @enderror" placeholder="{{ GoogleTranslate::trans("Your Phone", app()->getLocale()) }}" value="{{ $userData->phone }}">
                    @error('phone')
                        <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                            {{$message}}
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="mb-3 form-group">
                            <label for="">{{ GoogleTranslate::trans("Your Photo:", app()->getLocale()) }}</label>
                            <input type="file" name="photo" class="form-control" id="image">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="">
                            <img src="{{ (!empty($userData->photo)) ? url('frontend/assets/images/userprofile/'.$userData->photo):url('frontend/assets/images/userprofile/no_image.jpg') }}" class="mb-2 cursor-pointer rounded-circle profile-img" style="width: 84px;height:84px" onclick="showFullSize()" id="showImage" alt="">
                        </div>
                    </div>
                </div>

                <div class="mb-3 form-group">
                    <button type="submit" class="btn btn-primary">{{ GoogleTranslate::trans("Update", app()->getLocale()) }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
