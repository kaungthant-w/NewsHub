@extends("admin.admin_dashboard")
@section("admin")
    <div class="container">
        <div class="row">
            <div class="flex justify-center h-screen mx-auto mt-2">
                <div class="w-full p-6 sm:w-10/12 md:w-8/12 lg:w-7/12">
                    <h1 class="h3 form-heading">Add Admin </h1>
                    <form action="{{ route('admin#store') }}" method="POST" class="mt-12 ">
                        @csrf
                        <div class="my-6">
                            <label class="TWlabel">name</label>
                            <input type="text" name="name" class="TWform-control" placeholder=" Enter your name" value="{{ old('name') }}">
                            @error('name')
                            <div class="TWalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-6">
                            <label class="TWlabel">username</label>
                            <input type="text" name="username" class="TWform-control" placeholder=" Enter your username" value="{{ old('username') }}">
                            @error('username')
                            <div class="TWalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-6">
                            <label class="TWlabel">email</label>
                            <input type="email" name="email" class="TWform-control" placeholder=" Enter your email" value="{{ old('email') }}">
                            @error('email')
                                <div class="TWalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-6">
                            <label class="TWlabel">phone</label>
                            <input type="text" name="phone" class="TWform-control" placeholder=" Enter your phone" value="{{ old("phone") }}">
                            @error('phone')
                                <div class="TWalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-6">
                            <label class="TWlabel">address</label>
                            <input type="text" name="address" class="TWform-control" placeholder=" Enter your address" value="{{ old('address') }}">
                            @error('address')
                                <div class="TWalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-6">
                            <label class="TWlabel">password</label>
                            <input type="password" name="password" class="TWform-control" placeholder=" Enter your password" value="{{ old('password') }}">
                            @error('password')
                                <div class="TWalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-6">
                            <label class="TWlabel">Asign Roles</label>
                            <select name="roles" id="role_id" class="TWform-control">
                                <option value="">Select One Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-12">
                            <button class="rounded btnTW btnTW-info">Add Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
