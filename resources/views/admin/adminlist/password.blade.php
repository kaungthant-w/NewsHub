@extends("admin.admin_dashboard")
@section("admin")
    <div class="container">
        <div class="row">
            <div class="text-center col-md-11 d-flex justify-content-center" style="margin:20px 0">
                <h1 class="profile-heading"><span class="subprofile-heading">Admin</span> Profile</h1>
                <div class="justify-center mt-24 text-center align-middle col-md-6 ">
                    <div class="p-3 my-3 head">
                        <div class="flex items-center justify-center">
                            <img src="{{ (!empty($adminPassword->photo)) ? url('backend/assets/dist/img/admin_profile/'.$adminPassword->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" class="profile-img" onclick="showFullSize()" alt="">
                        </div>

                        <div class="image-overlay">
                            <span class="close-btn" onclick="closeFullSize()">&times;</span>
                            <img src="{{ (!empty($adminPassword->photo)) ? url('backend/assets/dist/img/admin_profile/'.$adminPassword->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" alt="Image" class="clickable-img" style="width: 80%;height:80%">
                        </div>

                        <p>{{ (!empty($adminPassword->name)) ? $adminPassword->name: "unknown" }}</p>
                        <p><a href="#">@ {{ (!empty($adminPassword->username)) ? $adminPassword->username: "unknown" }}</a></p>
                        <div class="mx-12 my-10 button">
                            <div class="btn btn-success">Contact</div>
                            <div class="btn btn-danger">Admin</div>
                        </div>
                    </div>

                    <div class="items-center">
                        <p>Full Name : {{ (!empty($adminPassword->name)) ? $adminPassword->name: "unknown" }}</p>
                        <p>Mobile : {{ (!empty($adminPassword->phone)) ? $adminPassword->phone: "unknown" }}</p>
                        <p>Email : {{ (!empty($adminPassword->email)) ? $adminPassword->email: "unknown" }}</p>
                        Location : {{ (!empty($adminPassword->address)) ? $adminPassword->address: "unknown" }}
                    </div>
                </div>
                <div class="mt-32 col-md-6">
                    <form action="{{ route('admin#update#password') }}" method="POST" enctype="multipart/form-data" class="text-left">
                    @csrf
                        <div class="">
                            <h3 class="text-3xl font-bold text-blue-400">Update Password</h3>
                            <div class="flex-col">
                                <input type="password" name="old_password" class="px-10 py-3 mt-3 rounded-sm" placeholder="Enter your old password" id="id_password1">
                                <i class="icon-eye far fa-eye toggle-password" data-target="#id_password1" value="{{old('old_password')}}"></i>

                                @error('old_password')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex-col">
                                <input type="password" name="new_password" class="px-10 py-3 mt-3 rounded-sm" placeholder="Enter your old password" id="id_password2">
                                <i class="icon-eye far fa-eye toggle-password" data-target="#id_password2" value="{{old('password')}}"></i>

                                @error('new_password')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="flex-col">
                                <input type="password" name="new_password_confirmation" class="px-10 py-3 mt-3 rounded-sm" placeholder="Enter your old password" id="id_password3">
                                <i class="icon-eye far fa-eye toggle-password" data-target="#id_password3" value="{{old('new_password_confirmation')}}"></i>

                                @error('new_password_confirmation')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-white ">
                                <button type="submit" class="mt-5 bg-blue-400 btn"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
