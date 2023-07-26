@extends("admin.admin_dashboard")
@section("admin")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">Edit Permission </h1>
            <a href="{{ route('permission#all') }}" class="mt-5 rounded btnTW btnTW-info">Back</a>
            <div class="max-w-screen-xl px-5 mx-auto">
                <div class="my-12 overflow-x-auto border rounded-lg ">

                    <div class="col-span-6 mt-12 md:col-span-3 md:mt-0">
                        <form id="myForm" action="{{ route('permission#update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <input type="hidden" name="id" value="{{ $permissions->id }}">
                            <div class="p-3">
                                <h4 class="text-3xl font-bold text-blue-400">Edit Permission</h4>

                                <div class="my-5 lg:w-6/12">
                                    <input type="text" name="name" class="TWform-control"  placeholder="Enter permission name" value="{{ $permissions->name }}">
                                </div>

                                <div class="mb-5 lg:w-6/12">
                                    <select name="group_name" id="group_nae" class="TWform-control">
                                        <option value="">Group Name</option>
                                        <option value="category" {{ $permissions->group_name == 'category' ?'selected':'' }}>Category</option>
                                        <option value="subcategory"  {{ $permissions->group_name == 'subcategory' ?'selected':'' }}>Subcategory</option>
                                        <option value="news" {{ $permissions->group_name == 'news' ?'selected':'' }}>News Post</option>
                                        <option value="banner" {{ $permissions->group_name == 'banner' ?'selected':'' }}>Banner</option>
                                        <option value="photo" {{ $permissions->group_name == 'photo' ?'selected':'' }}>Photo</option>
                                        <option value="video" {{ $permissions->group_name == 'video' ?'selected':'' }}>Video</option>
                                        <option value="live" {{ $permissions->group_name == 'live' ?'selected':'' }}>Live</option>
                                        <option value="review" {{ $permissions->group_name == 'review' ?'selected':'' }}>Review</option>
                                        <option value="admin" {{ $permissions->group_name == 'admin' ?'selected':'' }}>Admin Setting</option>
                                        <option value="role" {{ $permissions->group_name == 'role' ?'selected':'' }}>Role & Permission</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="rounded btnTW btnTW-primary"><i class="fa-regular fa-pen-to-square"></i> Update</button>
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
