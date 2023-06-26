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
                <div class="mb-3 form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="Enter your email">
                    <label for="floatingInput">Email address</label>

                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Enter your password">
                    <label for="floatingPassword">Password</label>

                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
                <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i> Login</button>
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
                    <div class="mb-3 form-floating">
                        <input type="name" name="name" class="form-control" id="floatingname" placeholder="Enter your email">
                        <label for="floatingname">Name</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Enter your email">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" name="password" autocomplete="new-password" class="form-control" id="floatingPassword" placeholder="Enter your password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" name="password_confirmation" autocomplete="new-password" class="form-control" id="floatingConfirmPassword" placeholder="Enter your confirm password">
                        <label for="floatingConfirmPassword">Confirm Password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
                    <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i> Register</button>
                </div>
            </form>
          </div>
        </div>
    </div>
