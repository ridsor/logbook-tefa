<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="shortcut icon" href="./assets/img/logo.png" type="image/png"> --}}

    <!-- My CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/styles.min.css" />

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <title>Teaching Factory PS-TI</title>
  </head>
  <body>
  <div
    class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xxl-3">
          <div class="card mb-0">
            <div class="card-body">
              <a href="index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                {{-- <img src="./assets/img/logo.png" width=42 /> --}}
                <h2 class="brand mt-4">Teaching Factory PS-TI</h2>
              </a>
              <p class="text-center">Selamat Datang</p>
              @error('login')
                  <div class="alert alert-danger" role="alert">
                      {{$message}}
                  </div>
              @enderror
              <form method="post" action="/login">
                @csrf
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-4">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button href="./index.html" class="btn btn-primary w-100 fs-4 mb-4 rounded-2" type="submit">Sign In</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/bootstrap.min.js" ></script>
  </body>
</html>