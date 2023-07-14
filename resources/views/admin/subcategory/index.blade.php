@extends("admin.admin_dashboard")
@section("admin")
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <h1 class="h3">Add Subcategory</h1>
                    <form action="{{ route('store#subcategory') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="text" name="subcategory_name" id="floatingsubcategory" class="form-control @error('subcategory_name') is-invalid @enderror mb-3" placeholder="Enter your Subcategory">
                            @error('subcategory_name')
                                <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                                    {{$message}}
                                </div>
                            @endif
                        </div>

                        <div>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="">
                                <option value="">Choose Category...</option>
                                @foreach ($categories as $category )
                                 <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                                    {{$message}}
                                </div>
                            @endif
                        </div>

                        <input type="submit" class="rounded btnTW btnTW-info" style="margin-top: 6px" value="Create">
                    </form>
            </div>
            <div class="col-md-8 col-xs-12">
                <h1 class="h3">All Subcategory <span class="text-white bg-blue-900 status">{{ count($subcategories) }}</span></h1>
                <div class="max-w-screen-xl px-5 mx-auto">
                    <div class="my-20 overflow-x-auto border rounded-lg">
                        <table class="table table-bordered ">
                        <tbody class="w-full">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="thTW">No</th>
                                    <th class="thTW">Category</th>
                                    <th class="thTW">Subcategory</th>
                                    <th class="thTW">Subcategory Slug</th>
                                    <th class="thTW">Date</th>
                                    <th class="thTW">Actions</th>
                                </tr>
                            </thead>
                            @if ($subcategories)
                                @foreach ($subcategories as $key => $subcategory)
                                    <tbody>
                                        <tr class="tbodyTW-tr">
                                            <td class="td">{{ $key+1 }}</td>
                                            <td class="td">{{ $subcategory['category']['category_name'] }}</td>
                                            <td class="td">{{ $subcategory->subcategory_name }}</td>
                                            <td class="td">{{ $subcategory->subcategory_slug }}</td>
                                            <td class="td">
                                                @if ($subcategory->created_at == NULL)
                                                    No Date
                                                @else
                                                    {{ $subcategory->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td class="td">
                                                <div class="flex w-[180px]">
                                                    <form class="inline" action="{{ route('delete#subcategory', $subcategory->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="rounded btnTW btnTW-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                                                    </form>

                                                    <a class="ml-4 rounded btnTW btnTW-success text-decoration-none edit-button"
                                                    href="#editSubcategoryId" data-toggle="modal"
                                                    data-subcategory-id="{{ $subcategory->id }}"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            @else
                                There is no data.
                            @endif
                        </tbody>
                    </table>
                    {{ $subcategories -> links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Show data -->
    <div class="modal fade" id="editSubcategoryId">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Subcategory</h5>
                    <button type="button" class="btn-close" data-dismiss="modal"></button>
                </div>
                <form id="editSubcategoryForm" action="{{ route('update#subcategory', $subcategory->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="subcategory_name">Category</label>
                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                            <option value="">Choose Category...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="my-4 form-floating">
                            <label for="subcategory_name">Subcategory</label>
                            <input type="text" name="subcategory_name" id="subcategory_name" class="form-control" id="floatingInput">
                        </div>
                        @error('subcategory_name')
                            <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                                {{ $message }}
                            </div>
                        @enderror
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
