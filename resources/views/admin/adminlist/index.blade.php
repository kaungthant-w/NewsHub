@extends("admin.admin_dashboard")
@section("admin")
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <h1 class="h3">All Admin List <span class="badge badge-info">{{ count($alladmin) }}</span></h1>
            <div class="box">
                <div class="box-body">
                    <table id="example1" class="table table-responsive table-bordered">
                        <tbody>
                            <tr class="">
                                <th>No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>role</th>
                                <th>status</th>
                                <th>Date</th>
                                <th style="width: 160px;">Actions</th>
                            </tr>
                            @foreach ($alladmin as $key => $admin)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>
                                        @if ($admin->username == NULL)
                                            <p>Unknown</p>
                                        @else
                                        {{ $admin->username }}
                                        @endif
                                    </td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->phone }}</td>
                                    <td>{{ $admin->address }}</td>
                                    <td>{{ $admin->role }}</td>
                                    <td>{{ $admin->status }}</td>
                                    <td>
                                        @if ($admin->created_at == NULL)
                                            No Date
                                        @else
                                            {{ $admin->created_at->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex overflow-scroll">
                                            <form class="inline" action="#" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                            <a class="btn btn-primary text-dark text-decoration-none edit-button"
                                            href="#editadminId" data-toggle="modal"
                                            data-admin-id="{{ $admin->id }}">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            {{ $alladmin -> links() }}
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
