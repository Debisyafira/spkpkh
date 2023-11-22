<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png" />
  <link rel="stylesheet" href="src/assets/css/styles.min.css" />
</head>

<body>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
          <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
              <div class="card mb-0">
                <div class="card-body">
                  <a href="{{ route('login') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                    {{-- <img src="../assets/images/Group6.svg" width="180" alt=""> --}}
                  </a>
                  <p class="text-center">Sistem Pendukung Keputusan</p>
                  <form>
                    <div class="mb-3">
                      <label for="name" class="form-label">{{ __('name') }}</label>
                      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                      @error('name')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label">{{ __('Password') }}</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    {{-- <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label text-dark" for="flexCheckChecked">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                            <a class="text-primary fw-bold" href="{{ route('register') }}">Forgot
                                                Password ?</a>
                                        </div> --}}
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                    {{-- <a type="submit"class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</a> --}}
                    <div class="d-flex align-items-center justify-content-center">
                      <p class="fs-4 mb-0 fw-bold">Buat akun?</p>
                      <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Create
                        an account</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
