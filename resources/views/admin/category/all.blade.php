@extends("admin.admin_dashboard")
@section("admin")
    <div class="container">
        <div class="row">
            @if (Auth::user()->can('category.add'))
                <div class="col-md-3 col-xs-12">
                    <h1 class="h3">Add Category</h1>
                    <form action="{{ route('store#category') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="text" name="category_name" id="floatingCategory" class="form-control @error('category_name') is-invalid @enderror" placeholder="Enter your category">
                            @error('category_name')
                                <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                                    {{$message}}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="rounded btnTW btnTW-info" style="margin-top: 6px"><i class="fa-regular fa-floppy-disk"></i> Create</button>
                    </form>
                </div>
            @endif

            <div class="col-md-8 col-xs-12">
                <h1 class="h3">All Category  <span class="text-white bg-blue-900 status">{{ count($categories) }}</span></h1>

                <div class="max-w-screen-xl px-5 mx-auto">
                    <div class="my-20 overflow-x-auto border rounded-lg ">
                        <table class="w-full">
                        <tbody>
                            <tr class="bg-gray-50">
                                <th class="thTW">No</th>
                                <th class="thTW">Category</th>
                                <th class="thTW">Category Slug</th>
                                <th class="thTW">Date</th>
                                <th class="thTW">Actions</th>
                            </tr>
                            @foreach ($categories as $key=>$category)
                                <tr class="tbodyTW-tr">
                                    <td class="td">{{ $key+1 }}</td>
                                    <td class="td">{{ $category->category_name }}</td>
                                    <td class="td">{{ $category->category_slug }}</td>
                                    <td class="td">
                                        @if ($category->created_at == NULL)
                                            No Date
                                        @else
                                        {{ $category->created_at->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td class="td">
                                        <div class="flex w-[180px]">
                                            @if (Auth::user()->can('category.delete'))
                                                <form class="inline" action="{{ route('delete#category', $category->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="rounded btnTW btnTW-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                                                </form>
                                            @endif


                                            @if (Auth::user()->can('category.edit'))
                                                <a class="ml-4 rounded btnTW btnTW-success text-decoration-none edit-button" href="#editCategoryId" data-toggle="modal" data-category-id="{{ $category->id }}"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- show data -->
    <div class="modal fade" id="editCategoryId">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-dismiss="modal"></button>
                </div>
                <form id="editCategoryForm" action="{{ route('update#category', ['id' => '__id__']) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 form-floating">
                            <label for="floatingInput">Category</label>
                            <input type="text" name="category_name" id="category_name" class="form-control" id="floatingInput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="rounded btnTW btnTW-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="rounded btnTW btnTW-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
