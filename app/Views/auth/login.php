<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WCode</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/guru/images/logos/faviconwcode.png') ?>" />
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
                <h2 class="text-center"><?= lang('Auth.loginTitle') ?></h2>
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form action="<?= url_to('login') ?>" method="post">
                  <?= csrf_field() ?>

                  <?php if ($config->validFields === ['email']) : ?>
                    <div class="mb-3">
                      <label for="login" class="form-label"><?= lang('Auth.email') ?></label>
                      <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" aria-describedby="emailHelp">
                      <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                      </div>
                    </div>
                  <?php else : ?>
                    <div class="mb-3">
                      <label for="login" class="form-label"><?= lang('Auth.emailOrUsername') ?></label>
                      <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" aria-describedby="emailHelp">
                      <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                      </div>
                    </div>
                  <?php endif; ?>

                  <div class="mb-4">
                    <label for="password" class="form-label"><?= lang('Auth.password') ?></label>
                    <div class="input-group">
                      <input type="password" name="password" id="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                      <button type="button" id="togglePassword" class="btn btn-outline-primary"><i id="togglePasswordIcon" class="fas fa-eye"></i></button>
                    </div>
                    <script>
                      document.getElementById("togglePassword").addEventListener("click", function() {
                        var passwordInput = document.getElementById("password");
                        var passwordType = passwordInput.getAttribute("type");

                        if (passwordType === "password") {
                          passwordInput.setAttribute("type", "text");
                          document.getElementById("togglePasswordIcon").classList.remove("fa-eye");
                          document.getElementById("togglePasswordIcon").classList.add("fa-eye-slash");
                        } else {
                          passwordInput.setAttribute("type", "password");
                          document.getElementById("togglePasswordIcon").classList.remove("fa-eye-slash");
                          document.getElementById("togglePasswordIcon").classList.add("fa-eye");
                        }
                      });
                    </script>
                  </div>

                  <!-- <div class="d-flex align-items-center justify-content-between mb-4">
                    <?php if ($config->allowRemembering) : ?>
                      <div class="form-check">
                        <input class="form-check-input primary" type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                        <label class="form-check-label text-dark" for="flexCheckChecked">
                          <?= lang('Auth.rememberMe') ?>
                        </label>
                      </div>
                      <?php if ($config->activeResetter) : ?>
                        <a class="text-primary fw-bold" href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
                      <?php endif; ?>
                    <?php endif; ?>
                  </div> -->
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"><?= lang('Auth.loginAction') ?></button>
                  <div class="d-flex align-items-center justify-content-center">
                    <?php if ($config->allowRegistration) : ?>
                      <p class="fs-4 mb-0 fw-bold"><?= lang('Auth.needAnAccount') ?></p>
                      <a class="text-primary fw-bold ms-2" href="<?= url_to('register') ?>"><?= lang('Auth.register') ?></a>
                    <?php endif; ?>
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
</body>

</html>