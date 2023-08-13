@extends('frontend.profile.index')
@section("content")
    <div class="mt-5 row g-3">
        <div class="text-center col-12 col-md-4">
            <h3 class="my-3">{{ GoogleTranslate::trans("User Profile", app()->getLocale()) }}</h3>
            <div class="flex items-center justify-center">
                <img src="{{ (!empty($userData->photo)) ? url('frontend/assets/images/userprofile/'.$userData->photo):url('frontend/assets/images/userprofile/no_image.jpg') }}" class="mb-2 rounded-circle profile-img" style="width: 84px;height:84px" onclick="showFullSize()" alt="{{ $userData->photo }}">
            </div>

            <div class="image-overlay">
                <span class="close-btn" onclick="closeFullSize()">&times;</span>
                <img src="{{ (!empty($userData->photo)) ? url('frontend/assets/images/userprofile/'.$userData->photo):url('frontend/assets/images/userprofile/no_image.jpg') }}" alt="{{ $userData->photo }}" class="clickable-img" style="width: 80%;height:80%">
            </div>

            <h5>{{ $userData->name }}</h5>
            <p class="text-muted">@ {{ $userData->username }}</p>
            <ul class="text-md-start ms-md-5">
                <li class="list-unstyled"><a href="{{ route('user#frontend#dashboard') }}" class="text-black text-decoration-none">{{ GoogleTranslate::trans("Your Profile", app()->getLocale()) }}</a></li>
                <li class="list-unstyled"><a href="#" class="text-black text-decoration-none">{{ GoogleTranslate::trans("Read Later List", app()->getLocale()) }}</a></li>
                <li class="list-unstyled">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" class="text-danger text-decoration-none">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
        <div class="p-3 col-12 col-md-6 col-lg-offset-4">
            <h3>{{ GoogleTranslate::trans("Change Password", app()->getLocale()) }}</h3>
            <form action="{{ route("user#update#password") }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group">
                    <label for="">{{ GoogleTranslate::trans("Old Password:", app()->getLocale()) }}</label>
                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="{{ GoogleTranslate::trans("Your old password", app()->getLocale()) }}">
                    @error('old_password')
                        <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                            {{$message}}
                        </div>
                    @endif
                </div>

                <div class="mb-3 form-group">
                    <label for="">{{ GoogleTranslate::trans("New Password:", app()->getLocale()) }}</label>
                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="{{ GoogleTranslate::trans("Your new password", app()->getLocale()) }}">
                    @error('new_password')
                        <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                            {{$message}}
                        </div>
                    @endif
                </div>

                <div class="mb-3 form-group">
                    <label for="">{{ GoogleTranslate::trans("Confirm Password:", app()->getLocale()) }}</label>
                    <input type="password" name="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" placeholder="{{ GoogleTranslate::trans("Your confirm password", app()->getLocale()) }}">
                    @error('new_password_confirmation')
                        <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                            {{$message}}
                        </div>
                    @endif
                </div>

                <div class="mb-3 form-group">
                    <button type="submit" class="btn btn-primary">{{ GoogleTranslate::trans("Update", app()->getLocale()) }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
