@extends("admin.admin_dashboard")
@section("admin")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">Add Role </h1>
            <a href="{{ route('role#list') }}" class="mt-5 rounded btnTW btnTW-info">Back</a>
            <div class="max-w-screen-xl px-5 mx-auto">
                <div class="my-12 overflow-x-auto border rounded-lg ">

                    <div class="col-span-6 mt-12 md:col-span-3 md:mt-0">
                        <form id="myForm" action="{{ route('role#store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="p-3">
                                <h4 class="text-3xl font-bold text-blue-400">Add Role</h4>

                                <div class="my-5 lg:w-6/12">
                                    <input type="text" name="name" class="TWform-control @error('name') is-invalid @enderror"  placeholder="Enter Role name">
                                    @error('name')
                                        <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                                            {{$message}}
                                        </div>
                                    @endif
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
