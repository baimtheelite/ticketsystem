<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/login-css.css') ?>">
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form action="<?= base_url('auth/process') ?>" method="post" class="form-signin">
            
            <!-- Email Address/Username -->
              <div class="form-group">
                <input name="username" type="email" id="inputEmail" class="form-control" placeholder="Masukkan Email" required autofocus>
              </div>

            <!-- Password -->
              <div class="form-group">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Masukkan Password" required>
              </div>

              <!-- <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div> -->

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
              <p>Belum daftar? <a href="<?= base_url('auth/daftar_akun') ?>">Register</a></p>
              <p>Lupa Password? <a href="<?= base_url('auth/lupa_password') ?>">Reset Password</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>