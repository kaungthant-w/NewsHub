@extends("admin.admin_dashboard")
@section("admin")
    <div class="container">
        <div class="row">
            <h1 class="profile-heading"><span class="subprofile-heading">Admin</span> Profile</h1>
            <div class="grid justify-center grid-cols-6 p-8">
                <div class="justify-center col-span-6 text-center align-middle md:col-span-2 ">
                    <div class="p-3 my-3 head">
                        <div class="flex items-center justify-center">
                            <img src="{{ (!empty($adminData->photo)) ? url('backend/assets/dist/img/admin_profile/'.$adminData->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" class="profile-img" onclick="showFullSize()" alt="">
                        </div>

                        <div class="image-overlay">
                            <span class="close-btn" onclick="closeFullSize()">&times;</span>
                            <img src="{{ (!empty($adminData->photo)) ? url('backend/assets/dist/img/admin_profile/'.$adminData->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" alt="Image" class="clickable-img" style="width: 80%;height:80%">
                        </div>

                        <p>{{ (!empty($adminData->name)) ? $adminData->name: "unknown" }}</p>
                        <p><a href="#">@ {{ (!empty($adminData->username)) ? $adminData->username: "unknown" }}</a></p>
                        <div class="mx-12 my-10 button">
                            <div class="btn btn-success">Contact</div>
                            <div class="btn btn-danger">Admin</div>
                        </div>
                    </div>

                    <div class="items-center">
                        <p>Full Name : {{ (!empty($adminData->name)) ? $adminData->name: "unknown" }}</p>
                        <p>Mobile : {{ (!empty($adminData->phone)) ? $adminData->phone: "unknown" }}</p>
                        <p>Email : {{ (!empty($adminData->email)) ? $adminData->email: "unknown" }}</p>
                        Location : {{ (!empty($adminData->address)) ? $adminData->address: "unknown" }}
                    </div>
                </div>
                <div class="col-span-6 mt-12 md:col-span-3 md:mt-0">
                    <form action="{{ route('admin#profile#store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="">
                                <h4 class="text-3xl font-bold text-blue-400">Personal Info</h4>
                            <div class="mb-5">
                                <input type="text" name="name" class="TWform-control" value="{{ $adminData->name }}" placeholder="Enter your name name">
                            </div>
                            <div class="mb-5">
                                <input type="text" name="username" class="TWform-control" value="{{ (!empty($adminData->username)) ? $adminData->username: "unknown" }}" placeholder="Enter your user name">
                            </div>
                            <div class="mb-5">
                                <input type="text" name="email" class="TWform-control" value="{{ (!empty($adminData->email)) ? $adminData->email: "unknown" }}" placeholder="Enter your email">
                            </div>
                            <div class="mb-5">
                                <input type="text" name="phone" class="TWform-control" value="{{ (!empty($adminData->phone)) ? $adminData->phone: "unknown" }}" placeholder="Enter your phone">
                            </div>
                            <div class="mb-5">
                                <input type="text" name="address" class="TWfrom-control" value="{{ (!empty($adminData->address)) ? $adminData->address: "unknown" }}" placeholder="Enter your address">
                            </div>

                            <div class="grid grid-cols-4 mt-10 mb-3">
                                <div class="col-span-4 md:col-span-2 ">
                                    <input type="file" name="photo" id="image" class="block w-full py-2 pr-3 bg-white border rounded-md shadow-sm placeholder:italic placeholder:text-slate-400 border-slate-300 pl-9 focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1">
                                </div>
                                <div class="col-span-4 mt-12 mb-6 md:col-span-2 md:mb-0 md:mt-0">
                                    <img src="{{ (!empty($adminData->photo)) ? url('backend/assets/dist/img/admin_profile/'.$adminData->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" class="ml-5 -mt-5 profile-img col-12" onclick="showFullSize()" alt="">
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="text-white bg-blue-600 btn"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
