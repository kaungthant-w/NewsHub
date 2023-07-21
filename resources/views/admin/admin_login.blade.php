<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Login Page</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {{-- <link rel="stylesheet" href={{ asset("backend/assets/bower_components/bootstrap/dist/css/bootstrap.min.css") }}> --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{ asset("backend/assets/bower_components/font-awesome/css/font-awesome.min.css") }}>
  <!-- Ionicons -->
  <link rel="stylesheet" href={{ asset("backend/assets/bower_components/Ionicons/css/ionicons.min.css") }}>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="container mt-5 d-flex justify-content-center align-items-center">
<div class="">
  <div class="my-3">
    <a href="#" class="text-decoration-none text-primary"><span class="fw-1 fs-3">News</span> Application</a>
  </div>
  <div class="mb-5">
    <form method="POST" action="{{ route('login') }}">
        @csrf
      <div class="mb-3 form-floating">
        <input type="email" name="email" class="form-control" placeholder="Enter Email">
      </div>
      <div class="mb-3 form-floating">
        <input type="password" name="password" class="form-control" placeholder="Enter Password">
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary">Sign In</button>
        </div>
      </div>
    </form>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
