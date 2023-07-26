@extends("admin.admin_dashboard")
@section("admin")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">Add Role in Permission </h1>
            <a href="{{ route('permission#role#all') }}" class="mt-5 rounded btnTW btnTW-info">Back</a>
            <div class="max-w-screen-xl px-5 mx-auto">
                <div class="my-12 overflow-x-auto border rounded-lg ">

                    <div class="col-span-6 mt-12 md:col-span-3 md:mt-0">
                        <form id="myForm" action="{{ route('role#permission#store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="p-3">
                                <h4 class="mb-6 text-3xl font-bold text-blue-400">Add Role in Permission</h4>

                                <div class="mb-5 lg:w-6/12">
                                    <select name="role_id" id="role_id" class="TWform-control">
                                        <option value="">Select One Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex gap-4 my-12 mr-12 text-center lg:w-3/12 md:mr-0">
                                    <input type="checkbox" name="form-check-input" id="permissionAll">
                                    <label for="permissionAll" class="mt-5 text-sm md:text-lg">Permission All</label>
                                </div>

                                @foreach ($permission_groups as $permission_group)
                                <div class="flex mb-12">
                                    <div class="flex gap-12 lg:w-3/12 ">
                                        <div class="mr-12 md:mr-0">
                                            <input type="checkbox" name="permission_group" id="permission_group" value="1">
                                            <label for="permission_group" class="text-sm md:text-lg">{{ $permission_group -> group_name }}</label>
                                        </div>
                                    </div>

                                    @php
                                        // $group = (object) ['group_name' => 'sample_group'];
                                        $permissions = App\Models\User::getPermissionByGroupName($permission_group->group_name);
                                    @endphp
                                    <div class="flex gap-12 lg:w-3/12">
                                        @foreach ($permissions as $permission )
                                            <div>
                                                <input type="checkbox" name="permission[]" id="permission" value="{{ $permission->id }}" id="customeCheck({{ $permission->id }}">
                                                <label for="permission" class="text-sm md:text-lg">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                @endforeach

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

