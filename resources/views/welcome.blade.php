<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <link rel="stylesheet" href="{{ asset('frontend/assets/custom/css/style.css') }}">
</head>
<body class="container-fluid m-0 p-0">
    <nav class="navbar navbar-expand-lg navbar-light opacity-75 shadow-sm" id="navHeader">
        <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-around ms-2 ms-md-0" id="navbarSupportedContent">
            <ul class="d-flex mt-4 mt-md-2">
                <li class="list-unstyled"> <a class="nav-link text-decoration-none me-2" href="#" target="_blank" title="facebook"><i class="fa-brands fa-facebook text-white"></i> </a> </li>
                <li class="list-unstyled"><a class="nav-link text-decoration-none me-2" href="#" target="_blank" title="twitter"><i class="fa-brands fa-twitter text-white"></i></a> </li>
                <li class="list-unstyled"><a class="nav-link text-decoration-none me-2" href="#" target="_blank" title="instagram"><i class="fa-brands fa-instagram text-white"></i></a> </li>
            </ul>
            <div class="nav-item col-8 col-md-3 ms-3 ms-md-0">
                <form action="#">
                    <div class="input-group">
                        <input type="text" name="post" class="form-control" placeholder="Enter your post title">
                        <button class="btn btn-danger ml-0 ml-md-3">Search</button>
                    </div>
                </form>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item ms-3 ms-md-0 me-md-2"><a href="#" id="dark-mode-toggle" class="nav-link text-dark text-decoration-none" > <i class="fa-solid fa-moon fw-bold"></i> </a> </li>

                @guest
                    <li class="nav-item me-md-2"><a class="nav-link text-white text-decoration-none px-3" href="#loginId" data-bs-toggle="modal">Login</a> </li>
                    <li class="nav-item"><a class="nav-link text-white text-decoration-none px-3"  href="#registerId" data-bs-toggle="modal">Register</a> </li>
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

    <div class="shadow-sm mt-4 py-3">
        <div class="container row">
            <div class="col-12 col-md-6">
                <img src="https://carsguide-res.cloudinary.com/image/upload/f_auto,fl_lossy,q_auto,t_cg_hero_large/v1/editorial/story/hero_image/1.2023-Tesla-Roadster-1001-565.jpg" class=" object-fit-cover" alt="banner"  style="height: 200px;width:100%;">
            </div>
            <div class="col-12 col-md-6">
                <p>Tesla, founded by Elon Musk in 2003, is a leading electric vehicle (EV) and clean energy company. It has revolutionized the automotive industry with its innovative electric cars, pushing the boundaries of technology and sustainability.</p>
                <p>Tesla's Model S, Model 3, Model X, and Model Y are popular electric vehicles known for their impressive range, acceleration, and advanced Autopilot features.</p>
            </div>
        </div>
    </div>

    <nav class="nav overflow-x-scroll flex-nowrap my-3">
        <li class="nav-item"><a href="#" class="nav-link text-nowrap">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-nowrap">Football News</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-nowrap">International News</a></li>
    </nav>

    <section>
        <div class="row">
            <div class="col-12 col-md-6">
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="http://127.0.0.1:8000/frontend/assets/images/6786.jpg" alt="Image 1">
                            <div class="carousel-caption">
                                <h5>The Eternal Bond</h5>
                                <p>In this heartwarming Indian film, two souls overcome societal barriers, cultural differences, and personal struggles to forge an unbreakable bond, showcasing the power of love, resilience, and eternal connections.</p>
                                <small>2021/3/20</small>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.wsj.net/im-492143/?width=700&height=467" alt="Image 2">
                            <div class="carousel-caption">
                                <h5>Vladimir Putin</h5>
                                <p>As of my knowledge cutoff in September 2021, the President of Russia is Vladimir Putin. However, please note that political positions may have changed since then.</p>
                                <small>2022/3/20</small>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.xinhuanet.com/english/2020-07/08/139197870_15942136087041n.jpg" alt="Image 3">
                            <div class="carousel-caption">
                                <h5>Xi Jinpin</h5>
                                <p>As of my knowledge cutoff in September 2021, the President of China is Xi Jinping. However, please note that political positions may have changed since then.</p>
                                <small>2022/1/10</small>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-6 my-3 my-md-0">
                <div class="row g-1">
                    <div class="col-12 position-relative">
                        <div class="image-overlay">
                            <img src="https://media-cldnry.s-nbcnews.com/image/upload/t_fit-760w,f_auto,q_auto:best/newscms/2020_46/3428038/201112-donald-trump-white-house-jm-2158.jpg" class="object-fit-cover w-100" style="height: 180px" alt="">
                            <div class="overlay"></div>
                            <div class="image-caption">
                                <p>As of my knowledge cutoff in September 2021, Donald Trump served as the 45th President of the United States from 2017 to 2021. However, please note that political positions and events may have changed since then.</p>
                            </div>
                        </div>
                    </div>

                        <div class="col-12 col-md-6">
                            <div class=" text-center"><img src="https://i.pinimg.com/550x/ae/14/54/ae1454162ce792592050146a55858238.jpg" class="object-fit-cover w-100"  alt=""></div>
                            <div class="ms-0 ms-md-3">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus porro </p>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class=" text-center"><img src="https://i.ytimg.com/vi/1xAerI7fXio/maxresdefault.jpg" class="object-fit-cover w-100"  alt=""></div>
                            <div class="ms-2 ms-md-0">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus porro </p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>

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
                <button type="submit" class="btn btn-outline-danger">Login</button>
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
                    <div class="form-floating mb-3">
                        <input type="password" name="password" autocomplete="new-password" class="form-control" id="floatingPassword" placeholder="Enter your password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirmation" autocomplete="new-password" class="form-control" id="floatingConfirmPassword" placeholder="Enter your confirm password">
                        <label for="floatingConfirmPassword">Confirm Password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Register</button>
                </div>
            </form>
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

      <script src="{{ asset('frontend/assets/custom/js/script.js') }}"></script>
</body>
</html>
