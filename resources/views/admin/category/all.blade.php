@extends("admin.admin_dashboard")
@section("admin")
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                <h1 class="h3">Add Category</h1>
                    <form action="{{ route('store#category') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <input type="text" name="category_name" id="floatingCategory" class="form-control @error('category_name') is-invalid @enderror" placeholder="Enter your category" value=" {{old('category_name')}} ">
                            <label for="floatingCategory">Enter your category</label>
                            @error('category_name')
                                <div class="invalid-feedback text-danger" style="margin-bottom: 10px">
                                    {{$message}}
                                </div>
                            @endif
                        </div>
                        <input type="submit" class="btn btn-info" style="margin-top: 6px" value="Create">
                    </form>
            </div>
            <div class="col-md-8 col-xs-12">
                <h1 class="h3">All Category  <span class="badge badge-info">{{ count($categories) }}</span></h1>
                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Category Slug</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($categories as $key=>$category)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_slug }}</td>
                                    <td>
                                        @if ($category->created_at == NULL)
                                            No Date
                                        @else
                                        {{ $category->created_at->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex overflow-scroll">
                                            <form class="inline" action="{{ route('delete#category', $category->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                            <a class="btn btn-primary" class="text-dark text-decoration-none" href="#editCategoryId" data-toggle="modal" data-category-id="{{ $category->id }}">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            {{ $categories->links() }}
                        </tbody>
                        </table>
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
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Category</label>
                            <input type="text" name="category_name" id="category_name" class="form-control" id="floatingInput">
                        </div>
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
