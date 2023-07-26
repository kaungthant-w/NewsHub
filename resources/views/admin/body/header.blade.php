<header class="main-header" style=" #3C3D8B">
    <!-- Logo -->
    <a href="{{ route("admin#dashboard") }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa-solid fa-house"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="text-white logo-lg"><i class="fa-solid fa-house"></i> Home </span>
    </a>
    <nav class="navbar navbar-static-top d-flex" style="background: #337AB7">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="messages-menu" title="dark theme" id="dark-mode-toggle">
              <a href="#">
                  <i class="mt-1 text-black fa-solid fa-moon"></i>
              </a>
          </li>
          <li class="messages-menu">
              <a href="{{ url('/') }}" title="User View">
                  <i class="text-white fa-solid fa-newspaper"></i>
              </a>
          </li>

          @php
              $reviewCount = Auth::user()->unreadNotifications()->count();
          @endphp
        <li class="dropdown notifications-menu hover:text-black">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="text-white fa fa-bell-o hover:text-black "title="notifications"></i>
              <span class="label label-warning">{{ $reviewCount }}</span>
            </a>
            @php
                $user = Auth::user();
                // $user = User::where('role', 'admin')->get();
                $reviewCount = session('reviewCount', $user->unreadNotifications()->count());
                // dd($user->toArray());
            @endphp

            <ul class="dropdown-menu">
                @forelse ($user->notifications as $notification )
                  <li class="header">
                      <div class="grid grid-cols-12 ">
                          <div class="col-span-2">
                              <img src="{{ asset('backend/assets/dist/img/admin_profile/'.$user->photo) }}" class="image-block" alt="{{ $user->photo }}">
                          </div>
                          <div class="col-span-10">
                              <p class="mb-8"> {{ $notification->data['message'] }} </p>
                              <span class="text-[12px]"> {{ $notification->created_at->diffForHumans() }} </span>
                          </div>
                      </div>
                  </li>
                @empty

                @endforelse
                  {{-- </li> --}}
            </ul>
        </li>

          @php
              $id = Auth::user()->id;
              $adminData = App\Models\User::find($id);
          @endphp
          <li class="text-white dropdown user user-menu">
            <a href="#" class="dropdown-toggle hover:text-black" data-toggle="dropdown" title="Profile view">
              <img src="{{ (!empty($adminData->photo)) ? url('backend/assets/dist/img/admin_profile/'.$adminData->photo):url('backend/assets/dist/img/admin_profile/no_image.jpg') }}" class="user-image img-bordered-sm" alt="User Image">
              <span class="text-white hidden-xs hover:text-black">{{ (!empty($adminData->name)) ? $adminData->name : 'unknown' }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                  <div class="">
                    <a href="{{ route("admin#profile") }}" class="" style="color:white !important;"><i class="text-white fa-regular fa-user hover:text-black"></i> Profile</a>
                  </div>
              </li>
              <li class="user-footer">
                  <div class="">
                    <a href="{{ route("admin#change#password") }}" class="" style="color:white !important;"><i class="fa-solid fa-lock"></i> Change Password</a>
                  </div>
              </li>
              <li class="user-footer">
                <div class="">
                  <a href="{{ route("admin#logout") }}" class="" style="color:white !important;"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
