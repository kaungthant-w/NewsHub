@extends("admin.admin_dashboard")
@section("admin")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">Add Permission </h1>
            <a href="{{ route('permission#all') }}" class="mt-5 rounded btnTW btnTW-info">Back</a>
            <div class="max-w-screen-xl px-5 mx-auto">
                <div class="my-12 overflow-x-auto border rounded-lg ">

                    <div class="col-span-6 mt-12 md:col-span-3 md:mt-0">
                        <form id="myForm" action="{{ route('permission#store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="p-3">
                                <h4 class="text-3xl font-bold text-blue-400">Add Permission</h4>

                                <div class="my-5 lg:w-6/12">
                                    <input type="text" name="name" class="TWform-control"  placeholder="Enter permission name">
                                </div>

                                <div class="mb-5 lg:w-6/12">
                                    <select name="group_name" id="group_nae" class="TWform-control">
                                        <option value="">Group Name</option>
                                        <option value="category">Category</option>
                                        <option value="subcategory">Subcategory</option>
                                        <option value="news">News Post</option>
                                        <option value="banner">Banner</option>
                                        <option value="photo">Photo</option>
                                        <option value="video">Video</option>
                                        <option value="live">Live</option>
                                        <option value="review">Review</option>
                                        <option value="admin">Admin Setting</option>
                                        <option value="role">Role & Permission</option>
                                    </select>
                                </div>

                                <div>
                                    <button type="submit" class="rounded btnTW btnTW-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
