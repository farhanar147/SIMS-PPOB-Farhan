<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
      integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <title>SIMS PPOB</title>
  </head>
  <body>
    <div class="container row">
      <div class="col-md-6 mt-2">
        <h3 class="text-center mb-5">SIMS PPOB</h3>
        <h1 class="text-center mb-3">Lengkapi data untuk membuat akun</h1>
        <?php if (isset($message)): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $message; ?></strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="container">
        <?php echo form_open('registration/processRegistration'); ?>
            <div class="input-group mb-3">
              <span class="input-group-text" id="addon-wrapping"
                ><i class="material-icons">&#xe0be;</i></span
              >
              <input
                type="email"
                name="email"
                class="form-control"
                placeholder="masukan email anda"
              />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="addon-wrapping"
                ><i class="material-icons">person</i></span
              >
              <input
                type="text"
                class="form-control"
                name="first_name"
                placeholder="nama depan"
              />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="addon-wrapping"
                ><i class="material-icons">person</i></span
              >
              <input
                type="text"
                class="form-control"
                name="last_name"
                placeholder="nama belakang"
              />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="addon-wrapping"
                ><i class="material-icons">&#xe88d;</i></span
              >
              <input
                type="password"
                class="form-control"
                name="password"
                placeholder="buat password"
              />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="addon-wrapping"
                ><i class="material-icons">&#xe88d;</i></span
              >
              <input
                type="password"
                class="form-control"
                name="confirm_password"
                placeholder="konfirmasi password"
              />
            </div>
            <div class="d-grid gap-2">
              <button
                class="btn"
                style="background-color: #ff6600; color: #ffff"
                type="submit"
                value="Register"
              >
                Registrasi
              </button>
              <?php echo form_close(); ?>
            </div>
          <p class="text-center mt-2">
            Sudah punya akun?login
            <a href="" style="text-decoration: none; color: #ff6600">disini</a>
          </p>
        </div>
      </div>
      <div class="col-md-4">
        <img src="<?= base_url('img/img-login.png')?>" height="550" width="auto" />
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
