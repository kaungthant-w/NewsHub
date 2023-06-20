@extends("admin.admin_dashboard")
@section("admin")
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <h1 class="h3">Add Subcategory</h1>
                    <form action="{{ route('store#subcategory') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="text" name="subcategory_name" id="floatingsubcategory" class="form-control @error('subcategory_name') is-invalid @enderror" placeholder="Enter your Subcategory" value=" {{old('subcategory_name')}} ">
                            <label for="floatingsubcategory">Enter your Subcategory</label>
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

                        <input type="submit" class="btn btn-info" style="margin-top: 6px" value="Create">
                    </form>
            </div>
            <div class="col-md-8 col-xs-12">
                <h1 class="h3">All Subcategory <span class="badge badge-info">{{ count($subcategories) }}</span></h1>
                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered ">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Subcategory Slug</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($subcategories as $key => $subcategory)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $subcategory['category']['category_name'] }}</td>
                                    <td>{{ $subcategory->subcategory_name }}</td>
                                    <td>{{ $subcategory->subcategory_slug }}</td>
                                    <td>
                                        @if ($subcategory->created_at == NULL)
                                            No Date
                                        @else
                                            {{ $subcategory->created_at->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex overflow-scroll">
                                            <form class="inline" action="{{ route('delete#subcategory', $subcategory->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                            <a class="btn btn-primary text-dark text-decoration-none edit-button"
                                            href="#editSubcategoryId" data-toggle="modal"
                                            data-subcategory-id="{{ $subcategory->id }}">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $subcategories -> links() }}
                        </tbody>
                        </table>
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

                        <div class="form-floating mb-3">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
