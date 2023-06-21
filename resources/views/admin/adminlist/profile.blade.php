@extends("admin.admin_dashboard")
@section("admin")
    <div class="container">
        <div class="row">
            <div class="col-md-11 d-flex justify-content-center text-center" style="margin:20px 0">
                <h1 class="text-blue" style="font-weight: 700; text-transform:uppercase;">Admin Profile</h1>
                <div class="col-md-4 text-center" style="border-radius:20px;margin-top:30px;">
                    <div class="head my-3 p-3">

                        <img src="{{ (!empty($adminData->photo)) ? url('backend/assets/dist/img/admin_profile/'.$adminData->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" class="object-fit-cover img-bordered-sm full-opacity-hover" onclick="showFullSize()" style="width:70px;height:70px; border-radius:50%; margin:20px 0px;" alt="">

                        <div class="image-overlay">
                            <span class="close-btn" onclick="closeFullSize()">&times;</span>
                            <img src="{{ (!empty($adminData->photo)) ? url('backend/assets/dist/img/admin_profile/'.$adminData->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" alt="Image" class="clickable-img" style="width: 80%;height:80%">
                            </div>
                        <p>{{ (!empty($adminData->name)) ? $adminData->name: "unknown" }}</p>
                        <p><a href="#">@ {{ (!empty($adminData->username)) ? $adminData->username: "unknown" }}</a></p>
                        <div class="button" style="margin:12px 0">
                            <div class="btn btn-success">Contact</div>
                            <div class="btn btn-danger">Admin</div>
                        </div>
                    </div>

                    <div class="body border border-top text-left" style="margin: 20px 0 0 60px;padding:20px 0;">
                        <p>Full Name : {{ (!empty($adminData->name)) ? $adminData->name: "unknown" }}</p>
                        <p>Mobile : {{ (!empty($adminData->phone)) ? $adminData->phone: "unknown" }}</p>
                        <p>Email : {{ (!empty($adminData->email)) ? $adminData->email: "unknown" }}</p>
                        Location : {{ (!empty($adminData->address)) ? $adminData->address: "unknown" }}
                    </div>
                </div>
                <div class="col-md-8" style="border-radius:20px;margin-top:30px; padding:30px">
                    <form action="{{ route('admin#profile#store') }}" method="POST" enctype="multipart/form-data" class="text-left">
                    @csrf
                        <div class="">
                                <h4>Personal Info</h4>
                            <div class="margin">
                                <input type="text" name="name" class="input-sm form-control" value="{{ $adminData->name }}" placeholder="Enter your name name">
                            </div>
                            <div class="margin">
                                <input type="text" name="username" class="input-sm form-control" value="{{ (!empty($adminData->username)) ? $adminData->username: "unknown" }}" placeholder="Enter your user name">
                            </div>
                            <div class="margin">
                                <input type="text" name="email" class="input-sm form-control" value="{{ (!empty($adminData->email)) ? $adminData->email: "unknown" }}" placeholder="Enter your email">
                            </div>
                            <div class="margin">
                                <input type="text" name="phone" class="input-sm form-control" value="{{ (!empty($adminData->phone)) ? $adminData->phone: "unknown" }}" placeholder="Enter your phone">
                            </div>
                            <div class="margin">
                                <input type="text" name="address" class="input-sm form-control" value="{{ (!empty($adminData->address)) ? $adminData->address: "unknown" }}" placeholder="Enter your address">
                            </div>

                            <div class="margin" style="display: flex; margin-top:40px;">
                                <input type="file" name="photo" id="image" class="input-sm form-control col-md-6">

                                <img src="{{ (!empty($adminData->photo)) ? url('backend/assets/dist/img/admin_profile/'.$adminData->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}"
                                class="object-fit-cover img-bordered-sm full-opacity-hover col-md-6" onclick="showFullSize()" style="width:70px;height:70px; border-radius:50%; margin:-20px 0px 0 20px;" id="showImage" alt="">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
