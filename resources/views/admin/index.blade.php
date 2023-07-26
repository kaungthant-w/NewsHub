@php

    $id = Auth::user()->id;
    $userid = App\Models\User::find($id);
    $user = App\Models\User::where('role', 'user')->get();
    $admin = App\Models\User::where('role', 'admin')->get();
    $newspost = App\Models\Admin\Newspost::get();
    $reviews = App\Models\User\Review::get();
    $status = $userid->status;

@endphp

@extends("admin.admin_dashboard")
@section("admin")
<section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <div class="TWcontent">
    @if ($status == 'active')
        <h4>Admin Account is <span class="TWtext-success">Active</span> </h4>
    @else
    <h4>Admin Account is <span class="TWtext-danger">Inactive</span> </h4>
    <p class="TWtext-danger">Please Wait..</p>
    <p class="TWtext-danger">Please Call. Admin will check soon.</p>
    @endif
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ count($newspost) }} </h3>
            <p>posts</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('newspost#list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ count($admin) }} </h3>

            <p>Admin Accounts</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ route('admin#list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ count($user) }}</h3>

            <p>User Accounts</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
              @php
                $sum = 0;
            @endphp

            @foreach ($newspost as $newsView)
                @php
                    $sum += $newsView->view_count;
                @endphp
            @endforeach

            <h3>
                {{ $sum }}
            </h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ route('newspost#list') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
              @php
                $sum = 0;
            @endphp

            @foreach ($reviews as $newsView)
                @php
                    $sum += $newsView->status;
                @endphp
            @endforeach

            <h3>
                {{ $sum }}
            </h3>

            <p>Reviews</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ route('review#system') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </section>
@endsection
