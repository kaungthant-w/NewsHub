@extends("admin.admin_dashboard")
@section("admin")
    <div class="container">
        <div class="row">
            <div class="flex justify-center h-screen mx-auto mt-2">
                <div class="w-full p-6 sm:w-10/12 md:w-8/12 lg:w-7/12">
                    <h1 class="h3 form-heading">Add Admin </h1>
                    <form action="{{ route('admin#update') }}" method="POST" enctype="multipart/form-data" class="mt-12 ">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="my-6">
                            <label class="TWlabel">name</label>
                            <input type="text" name="name" class="TWform-control" value="{{ $data->name }}">
                            @error('name')
                            <div class="TWalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-6">
                            <label class="TWlabel">New password</label>
                            <input type="password" name="password" class="TWform-control" placeholder="Enter new Password">
                            @error('password')
                                <div class="TWalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-6">
                            <label class="TWlabel">username</label>
                            <input type="text" name="username" class="TWform-control" value="{{ $data->username }}">
                            @error('username')
                            <div class="TWalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-6">
                            <label class="TWlabel">email</label>
                            <input type="email" name="email" class="TWform-control" value="{{ $data->email }}">
                            @error('email')
                                <div class="TWalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-6">
                            <label class="TWlabel">phone</label>
                            <input type="text" name="phone" class="TWform-control" value="{{ $data->phone }}">
                            @error('phone')
                                <div class="TWalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-6">
                            <label class="TWlabel">address</label>
                            <input type="text" name="address" class="TWform-control" value="{{ $data->address }}">
                            @error('address')
                                <div class="TWalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="grid grid-cols-4 mt-10 mb-3">
                            <div class="col-span-4 md:col-span-2 ">
                                <input type="file" name="photo" id="image" class="TWform-file">
                            </div>
                            <div class="col-span-4 mt-12 mb-6 md:col-span-2 md:mb-0 md:mt-0">
                                <img src="{{ (!empty($data->photo)) ? url('backend/assets/dist/img/admin_profile/'.$data->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" class="ml-5 -mt-5 profile-img col-12" onclick="showFullSize()" id="showImage" alt="">
                            </div>
                            <div class="image-overlay">
                                <span class="close-btn" onclick="closeFullSize()">&times;</span>
                                <img src="{{ (!empty($data->photo)) ? url('backend/assets/dist/img/admin_profile/'.$data->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" alt="Image" class="clickable-img" style="width: 80%;height:80%">
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="rounded btnTW btnTW-info">Update Account</button>
                            <a href="{{ route("admin#list") }}" class="rounded btnTW btnTW-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
