<header class="main-header">
  <!-- Logo -->
  <a href="{{ route("admin#dashboard") }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><i class="fa-solid fa-house"></i></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><i class="fa-solid fa-house"></i> Home </span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="messages-menu" id="dark-mode-toggle">
            <a href="#">
                <i class="fa-solid fa-moon mt-4 text-black"></i>
            </a>
        </li>
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">4</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 4 messages</li>
            <li>
              <ul class="menu">
                <li>
                  <a href="#">
                    <div class="pull-left">
                      <img src="{{ asset("backend/assets/dist/img/user1-128x128.jpg") }}" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      Developers
                      <small><i class="fa fa-clock-o"></i> Today</small>
                    </h4>
                    <p>Why not buy a new awesome theme?</p>
                  </a>
                </li>
                </li>
              </ul>
        </li>
            <li class="footer"><a href="#">See All Messages</a></li>
      </ul>
        </li>
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset("backend/assets/dist/img/user1-128x128.jpg") }}" class="user-image" alt="User Image">
            <span class="hidden-xs">U Mya Kyaw</span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-footer">
              <div class="pull-right">
                <a href="{{ route("admin#logout") }}" class="btn btn-default btn-flat">Logout</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
