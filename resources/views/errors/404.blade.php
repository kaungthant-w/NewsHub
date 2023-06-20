<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body class="container-fluid m-0 p-0">
    <nav class="navbar navbar-expand-lg navbar-light opacity-75 shadow-sm" style="background: rgba(62, 119, 206,0.7)">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-around ms-3 ms-md-0" id="navbarSupportedContent">
            <ul class="d-flex mt-2">
                <li class="list-unstyled"> <a class="nav-link text-decoration-none me-2" href="#" target="_blank" title="facebook"><i class="fa-brands fa-facebook text-white"></i> </a> </li>
                <li class="list-unstyled"><a class="nav-link text-decoration-none me-2" href="#" target="_blank" title="twitter"><i class="fa-brands fa-twitter text-white"></i></a> </li>
                <li class="list-unstyled"><a class="nav-link text-decoration-none me-2" href="#" target="_blank" title="twitter"><i class="fa-brands fa-instagram text-white"></i></a> </li>
            </ul>
            <div class="nav-item">
                <form action="#">
                    <div class="input-group">
                        <input type="text" name="post" class="form-control" placeholder="Enter your post title">
                        <button class="btn btn-danger ml-3">Search</button>
                    </div>
                </form>
            </div>
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item"><a class="nav-link text-white text-decoration-none" href="#loginId" data-bs-toggle="modal">Login</a> </li>
                    <li class="nav-item"><a class="nav-link text-white text-decoration-none"  href="#registerId" data-bs-toggle="modal">Register</a> </li>
                @endguest

                @auth
                    <li class="nav-item"><a href="#" class="nav-link text-white text-decoration-none fw-bold" >{{ Auth::user()->name }}</a> </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="nav-item fw-bold">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="nav-link text-danger">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                    </ul>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="mt-5 text-center">
        <h1 class="display-4 text-primary">404 Page Not Found</h1>
        <p class="lead text-info">The page you are looking for does not exist.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Go Back to Homepage</a>
        <div class="mt-2">
            <a href="{{ url('/') }}">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkbDDJBrBDBU828znc53td3LzKK21HOdApqKnCeDACq2ElTzMiJD6j8N_zL3Dz1gRbo70&usqp=CAU" alt="404 Error" class="img-fluid rounded opacity-75">
            </a>
        </div>
    </div>

    <!-- Modal login-->
    <div class="modal fade" id="loginId">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Login</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Enter your email">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Enter your password">
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Login</button>
                </div>
            </form>
          </div>
        </div>
      </div>

        <!-- Modal register-->
        <div class="modal fade" id="registerId">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="name" name="name" class="form-control" id="floatingname" placeholder="Enter your email">
                            <label for="floatingname">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Enter your email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" autocomplete="new-password" class="form-control" id="floatingPassword" placeholder="Enter your password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password_confirmation" autocomplete="new-password" class="form-control" id="floatingConfirmPassword" placeholder="Enter your confirm password">
                            <label for="floatingConfirmPassword">Confirm Password</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Register</button>
                    </div>
                </form>
              </div>
            </div>
          </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
