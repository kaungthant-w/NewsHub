@php

    $id = Auth::user()->id;
    $userid = App\Models\User::find($id);
    $status = $userid->status;

@endphp


<aside class="text-white main-sidebar" style="background: #263238;">
    <section class="sidebar">
      <div class="user-panel" style="background: #1A2226">
        @php
            $id = Auth::user()->id;
            $adminData = App\Models\User::find($id);
        @endphp

        <div class="pull-left image">
            <img src="{{ (!empty($adminData->photo)) ? url('backend/assets/dist/img/admin_profile/'.$adminData->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" class="img-circle object-fit-cover img-bordered-sm" style="margin-left: " alt="{{ $adminData->photo }}">
        </div>


        <div class="pull-left info">
          <p>{{ (!empty($adminData -> name)) ? $adminData -> name:"unknoun"}}</p>
          <a href="#">
            @if ($status == 'active')
                <i class="fa fa-circle text-success"></i>
            @elseif ($status == 'inactive')
                <i class="fa fa-circle text-danger"></i>
            @endif
            {{ (!empty($adminData -> status)) ? $adminData -> status:"unknown"}}</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="my-6 ml-3 sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
            </span>
        </div>
      </form>
      <!-- sidebar menu-->
      <ul class="text-white sidebar-menu" data-widget="tree" style="background-color: #1A2226;">
        <li class="header">MAIN NAVIGATION</li>

        @if ($status == 'active')

            <li class="treeview">
            <a href="#">
                <i class="fa-solid fa-list"></i> <span>Category</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="{{ route("all#categories") }}"><i class="fa fa-circle-o"></i> All Category</a></li>
            </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa-solid fa-list-check"></i> <span>Subcategory</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li class="active"><a href="{{ route("subcategory#list") }}"><i class="fa fa-circle-o"></i> All Subcategory</a></li>
                </ul>
            </li>

            <li class="treeview">
            <a href="#">
                <i class="fa-solid fa-blog"></i>
                <span>News Post Setting</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="{{ route("newspost#list") }}"><i class="fa fa-circle-o"></i> News Post List Setting</a></li>
                <li class=""><a href="{{ route("newspost#add") }}"><i class="fa fa-circle-o"></i> Add News Post Setting</a></li>
            </ul>
            </li>

            <li class="treeview">
            <a href="#">
                <i class="fa-brands fa-buysellads"></i>
                <span>Banner Setting</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="{{ route('banners#list') }}"><i class="fa fa-circle-o"></i> All Banner Setting</a></li>
            </ul>
            </li>

            <li class="treeview">
            <a href="#">
                <i class="fa-solid fa-images"></i>
                <span>Photo Setting</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="{{ route('gallery#list') }}"><i class="fa fa-circle-o"></i> All Photo Setting</a></li>
            </ul>
            </li>

            <li class="treeview">
            <a href="#">
                <i class="fa-solid fa-video"></i>
                <span>Video Setting</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="{{ route('video#gallery#list') }}"><i class="fa fa-circle-o"></i> All Video Setting</a></li>
            </ul>
            </li>

            <li class="treeview">
            <a href="#">
                <i class="fa-regular fa-circle-dot"></i>
                <span>Live Tv Setting</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="#"><i class="fa fa-circle-o"></i> All Live Tv Setting</a></li>
                <li class=""><a href="#"><i class="fa fa-circle-o"></i> Add Live Tv Setting</a></li>
            </ul>
            </li>

            <li class="treeview">
            <a href="#">
                <i class="fa-regular fa-comments"></i>
                <span>Review Setting</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="#"><i class="fa fa-circle-o"></i> All Review Setting</a></li>
                <li class=""><a href="#"><i class="fa fa-circle-o"></i> Add Review Setting</a></li>
            </ul>
            </li>

            <li class="treeview">
            <a href="#">
                <i class="fa-solid fa-user-lock"></i>
                <span>Setting Admin User</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="{{ route('admin#list') }}"><i class="fa fa-circle-o"></i> All Setting Admin</a></li>
                <li class=""><a href="{{ route('admin#add') }}"><i class="fa fa-circle-o"></i> Add Setting Admin</a></li>
            </ul>
            </li>

            <li class="treeview">
            <a href="#">
                <i class="fa-solid fa-shield-halved"></i>
                <span>Role & Permission</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="#"><i class="fa fa-circle-o"></i> All Role & Permission</a></li>
                <li class=""><a href="#"><i class="fa fa-circle-o"></i> Add Role & Permission</a></li>
            </ul>
            </li>
        @endif
      </ul>
    </section>
  </aside>
