@extends("admin.admin_dashboard")
@section("admin")
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">All Admin List <span class="text-white status bg-sky-600 ">{{ count($alladmin) }}</span></h1>
            <a href="#" class="mt-5 rounded btnTW btnTW-info">Add Admin</a>
            <div class="max-w-screen-xl px-5 mx-auto">
                <div class="my-12 overflow-x-auto border rounded-lg ">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="thTW">No</th>
                                <th class="thTW">Username</th>
                                <th class="thTW">Image</th>
                                <th class="thTW">Phone</th>
                                <th class="thTW">Address</th>
                                <th class="thTW">role</th>
                                <th class="thTW">status</th>
                                <th class="thTW">Date</th>
                                <th style="thTW">Actions</th>
                            </tr>
                        </thead>
                        @foreach ($alladmin as $key => $admin)
                            <tbody>
                                <tr class="tbodyTW-tr">
                                    <td class="td">{{ $key+1 }}</td>
                                    <td class="td">
                                        @if ($admin->username == NULL)
                                            <p>Unknown</p>
                                        @else
                                        {{ $admin->username }}
                                        @endif
                                    </td>
                                    <td class="flex td">
                                        <div class="image-block">
                                            <img src="{{ (!empty($admin->photo)) ? url('backend/assets/dist/img/admin_profile/'.$admin->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" class="image" onclick="showFullSize()" alt="">
                                        </div>
                                        <div class="ml-2.5">
                                            <span class="user">{{ $admin->name }}</span>
                                            <span class="email">{{ $admin->email }}</span>
                                        </div>
                                    </td>
                                    <td class="td">{{ $admin->phone }}</td>
                                    <td class="td">{{ $admin->address }}</td>
                                    <td class="td">
                                        {{ $admin->role}}

                                    </td>
                                    <td class="td">
                                        @if ($admin->status == 'active')
                                            <span class="text-green-900 bg-green-100 status">{{ $admin->status}}</span>
                                            @elseif ($admin->status == 'inactive')
                                            <span class="text-red-900 bg-red-100 status">{{$admin->status}}</span>
                                        @endif
                                    </td>
                                    <td class="td">
                                        @if ($admin->created_at == NULL)
                                            No Date
                                        @else
                                            <span class="text-sm">{{ $admin->created_at->diffForHumans() }}</span>
                                        @endif
                                    </td>
                                    <td class="td">
                                        <div class="flex w-[180px]">
                                            <form class="inline" action="" method="POST">
                                                @csrf
                                                <button type="submit" class="rounded btnTW btnTW-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                                            </form>

                                            <a class="ml-4 rounded btnTW btnTW-success text-decoration-none edit-button" href="#"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach

                    </table>
                </div>
                {{ $alladmin -> links() }}
            </div>
        </div>
    </div>
</div>
@endsection
