<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WCode</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('/assets/guru/images/logos/faviconwcode.png') ?>" />
  <link rel="stylesheet" href="<?= base_url('/assets/guru/css/styles.min.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="<?= base_url('../assets/guru/images/logos/wcode.png') ?>" width="180" alt="">
                </a>
                <h2 class="text-center"><?= lang('Auth.register') ?></h2>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form action="<?= url_to('register') ?>" method="post">
                  <?= csrf_field() ?>
                  <div class="mb-3">
                    <label for="username" class="form-label"><?= lang('Auth.username') ?></label>
                    <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label"><?= lang('Auth.email') ?></label>
                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label"><?= lang('Auth.password') ?></label>
                    <div class="input-group">
                      <input type="password" name="password" id="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                      <button type="button" id="togglePassword" class="btn btn-outline-primary"><i class="fas fa-eye"></i></button>
                    </div>
                  </div>

                  <div class="mb-4">
                    <label for="pass_confirm" class="form-label"><?= lang('Auth.repeatPassword') ?></label>
                    <div class="input-group">
                      <input type="password" name="pass_confirm" id="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                      <button type="button" id="togglePassConfirm" class="btn btn-outline-primary"><i class="fas fa-eye"></i></button>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"><?= lang('Auth.register') ?></button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold"><?= lang('Auth.alreadyRegistered') ?></p>
                    <a class="text-primary fw-bold ms-2" href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url('assets/guru/libs/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/guru/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <script>
    document.getElementById("togglePassword").addEventListener("click", function() {
      var passwordInput = document.getElementById("password");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        document.getElementById("togglePassword").innerHTML = '<i class="fas fa-eye-slash"></i>';
      } else {
        passwordInput.type = "password";
        document.getElementById("togglePassword").innerHTML = '<i class="fas fa-eye"></i>';
      }
    });

    document.getElementById("togglePassConfirm").addEventListener("click", function() {
      var passConfirmInput = document.getElementById("pass_confirm");

      if (passConfirmInput.type === "password") {
        passConfirmInput.type = "text";
        document.getElementById("togglePassConfirm").innerHTML = '<i class="fas fa-eye-slash"></i>';
      } else {
        passConfirmInput.type = "password";
        document.getElementById("togglePassConfirm").innerHTML = '<i class="fas fa-eye"></i>';
      }
    });
  </script>

</body>

</html>