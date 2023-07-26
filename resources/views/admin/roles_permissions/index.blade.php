@extends("admin.admin_dashboard")
@section("admin")
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">All role & permission <span class="text-white status bg-sky-600 ">{{ count($roles) }}</span></h1>
            <div class="md:justify-between md:flex">
                <a href="{{ route('permission#role#add') }}" class="h-12 mt-5 rounded btnTW btnTW-info">Add Role & permission</a>
                {{ $roles -> links() }}
            </div>
            <div class="max-w-screen-xl px-5 mx-auto">

                <div class="my-12 overflow-x-auto border rounded-lg ">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="thTW">No</th>
                                <th class="thTW">Role Name</th>
                                <th class="thTW">Permission Name</th>
                                <th style="thTW">Actions</th>
                            </tr>
                        </thead>
                        @if (count($roles) > 0)
                        <tbody>
                            <tr>
                                @foreach ($roles as $key => $role)
                                <td class="td">{{ $key+1 }}</td>
                                <td class="td"> {{ $role -> name }}</td>
                                <td class="flex flex-wrap p-6 td w-[300px] ">
                                    @foreach ($role->permissions as $permission)
                                        <div class="p-2 mb-6 ml-2 text-white btnTW-info rounded-3xl">{{ $permission->name }}</div>
                                    @endforeach
                                </td>
                                    <td class="td">
                                    <div class="flex w-[180px]">
                                        <a href="{{ route("permission#role#delete",$role->id) }}" class="rounded btnTW btnTW-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                                        <a class="ml-4 rounded btnTW btnTW-success text-decoration-none edit-button" href="{{ route("permission#role#edit", $role->id) }}"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                        @else
                            <td class="p-12 text-3xl text-center text-red-400"> There is no data.</td>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
