 <!-- Modal login-->
 <div class="modal fade" id="loginId">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ GoogleTranslate::trans("Login", app()->getLocale()) }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3 form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatInput" placeholder="{{ GoogleTranslate::trans("Enter your email", app()->getLocale()) }}">
                    <label for="floatInput">{{ GoogleTranslate::trans("Email address", app()->getLocale()) }}</label>

                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatPassword" placeholder="{{ GoogleTranslate::trans("Enter your password", app()->getLocale()) }}">
                    <label for="floatPassword">{{ GoogleTranslate::trans("Password", app()->getLocale()) }}</label>

                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> {{ GoogleTranslate::trans("Close", app()->getLocale()) }}</button>
                <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i> {{ GoogleTranslate::trans("Login", app()->getLocale()) }}</button>
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
              <h5 class="modal-title" id="exampleModalLabel">{{ GoogleTranslate::trans("Register", app()->getLocale()) }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 form-floating">
                        <input type="name" name="name" class="form-control" id="floatingname" placeholder="{{ GoogleTranslate::trans("Enter your email", app()->getLocale()) }}">
                        <label for="floatingname">{{ GoogleTranslate::trans("Name", app()->getLocale()) }}</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="{{ GoogleTranslate::trans("Enter your email", app()->getLocale()) }}">
                        <label for="floatingInput">{{ GoogleTranslate::trans("Email address", app()->getLocale()) }}</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" name="password" autocomplete="new-password" class="form-control" id="floatingPassword" placeholder="{{ GoogleTranslate::trans("Enter your password", app()->getLocale()) }}">
                        <label for="floatingPassword">{{ GoogleTranslate::trans("Password", app()->getLocale()) }}</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" name="password_confirmation" autocomplete="new-password" class="form-control" id="floatingConfirmPassword" placeholder="{{ GoogleTranslate::trans("Enter your confirm password", app()->getLocale()) }}">
                        <label for="floatingConfirmPassword">{{ GoogleTranslate::trans("Confirm Password", app()->getLocale()) }}</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> {{ GoogleTranslate::trans("Close", app()->getLocale()) }}</button>
                    <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i> {{ GoogleTranslate::trans("Register", app()->getLocale()) }}</button>
                </div>
            </form>
          </div>
        </div>
    </div>
