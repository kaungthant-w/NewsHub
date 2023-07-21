@extends("admin.admin_dashboard")
@section("admin")
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">All post List <span class="text-white status bg-sky-600 ">{{ count($allNewsPost) }}</span></h1>
            <div class="md:justify-between md:flex">
                <a href="{{ route('newspost#add') }}" class="h-12 mt-5 rounded btnTW btnTW-info">Add news Post</a>
                {{ $allNewsPost -> links() }}
            </div>
            <div class="max-w-screen-xl px-5 mx-auto">

                <div class="my-12 overflow-x-auto border rounded-lg ">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="thTW">No</th>
                                <th class="thTW">Image</th>
                                <th class="thTW">Title</th>
                                <th class="thTW">Details</th>
                                <th class="thTW">Category</th>
                                <th class="thTW">User</th>
                                <th class="thTW">Viewers</th>
                                <th class="thTW">Date</th>
                                <th class="thTW">Status</th>
                                <th style="thTW">Actions</th>
                            </tr>
                        </thead>
                        @foreach ($allNewsPost as $key => $newspost)
                            <tbody>
                                <tr>
                                    <td class="td">{{ $key+1 }}</td>
                                    <td class="flex td">
                                        <div class="image-block">
                                            <img src="{{ (!empty(asset($newspost->image))) ? asset($newspost->image):url('backend/assets/dist/img/newspost/news_img/no_image.jpg') }}" class="image" >
                                        </div>
                                        {{-- <div class="image-block">
                                            <img src="public/backend/assets/dist/img/newspost/news_img/background.jpg" alt="">
                                        </div> --}}
                                    </td>
                                    <td class=""> {{ Str::limit($newspost->news_title, 10) }}</td>
                                    <td class=""> {{ Str::limit($newspost->news_details, 20) }}</td>
                                    {{-- <td class="td">{{ $newspost->category_id }}</td> --}}
                                    {{-- <td class="td">{{ $newspost->user_id }}</td> --}}
                                    <td class="td">{{ $newspost['category']['category_name'] }}</td>
                                    <td class="td">{{ $newspost['user']['name'] }}</td>
                                    <td class="td">{{ $newspost['view_count'] }} <i class="fa-solid fa-eye"></i></td>
                                    <td class="td">
                                        @if ($newspost->created_at == NULL)
                                            No Date
                                        @else
                                            <span class="text-sm">{{ $newspost->created_at->diffForHumans() }}</span>
                                        @endif
                                    </td>
                                    <td class="td">
                                        @if ($newspost->status == 1)
                                            <a href="{{ route('newspost#inactive', $newspost->id) }}">
                                                <span class="text-green-900 bg-green-300 cursor-pointer status">Active</span>
                                            </a>
                                            {{-- <a href="#">
                                                <span class="text-green-900 bg-green-300 cursor-pointer status">Active</span>
                                            </a> --}}
                                            @elseif ($newspost->status == 0)
                                            <a href="{{ route('newspost#active', $newspost->id) }}">
                                                <span class="text-red-900 bg-red-300 cursor-pointer status">inactive</span>
                                            </a>

                                            {{-- <a href="#">
                                                <span class="text-red-900 bg-red-300 cursor-pointer status">inactive</span>
                                            </a> --}}
                                        @endif
                                    </td>
                                        <td class="td">
                                        <div class="flex w-[180px]">
                                            <a href="{{ route("newspost#delete",$newspost->id) }}" class="rounded btnTW btnTW-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                                            {{-- <a href="#" class="rounded btnTW btnTW-danger"><i class="fa-solid fa-trash"></i> Delete</a> --}}

                                            <a class="ml-4 rounded btnTW btnTW-success text-decoration-none edit-button" href="{{ route("newspost#edit", $newspost->id) }}"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                            {{-- <a class="ml-4 rounded btnTW btnTW-success text-decoration-none edit-button" href="#"><i class="fa-regular fa-pen-to-square"></i> Edit</a> --}}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
