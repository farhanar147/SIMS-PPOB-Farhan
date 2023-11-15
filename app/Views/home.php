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
    <!-- Font awesome CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <!-- Font googleapis CSS -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <!-- Bootstrap CSS -->
    <style>
      .nav-link {
        color: black;
      }
    </style>

    <title>SIMS PPOB</title>
  </head>
  <body>
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img
            src="<?= base_url('img/logo.png') ?>"
            alt="Logo"
            class="d-inline-block align-text-top"
          />
          SIMS PPOB
        </a>
        <div class="d-flex">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Top Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Transaction</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Akun</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="row">
      <div class="col-md-6 pt-3">
        <div class="container">
          <img
            src="photo.png"
            width="60px"
            alt=""
            class="rounded-circle img-thumbnailW"
          />
          <p>Selamat datang,</p>
          <h3><?php echo $profile['data']['first_name']; ?> <span><?php echo $profile['data']['last_name']; ?><span></h3>
        </div>
      </div>
      <div class="col-md-5 container">
        <div
          class="container"
          style="background-color: #f42619; height: 161px; border-radius: 10px"
        >
          <p class="text-white pt-3">Saldo anda</p>
          <?php 
          //$rupiah = "Rp " . number_format($balance, 0, ',', '.');
          ?>
          <h2 class="text-white"><span id="hiddenNumber" style="display: none;">Rp. <?= $balance['data']['balance'] ?? 'N/A'; ?></span></h2>
          <a href="#" onclick="toggleVisibility()" class="text-white" style="text-decoration:none;">Lihat Saldo</a>
        </div>
      </div>
    </div>

    <div class="container mt-5">
      <div class="col-12">
        <img src="<?= base_url('img/Game.png') ?>" class="rounded mx-2" alt="..." />
        <img src="<?= base_url('img/Kurban.png') ?>" class="rounded mx-2" alt="..." />
        <img src="<?= base_url('img/Listrik.png') ?>" class="rounded mx-2" alt="..." />
        <img src="<?= base_url('img/Musik.png') ?>" class="rounded mx-2" alt="..." />
        <img src="<?= base_url('img/Paket-Data.png') ?>" class="rounded mx-2" alt="..." />
        <img src="<?= base_url('img/PBB.png') ?>" class="rounded mx-2" alt="..." />
        <img src="<?= base_url('img/PDAM.png') ?>" class="rounded mx-2" alt="..." />
        <img src="<?= base_url('img/PGN.png') ?>" class="rounded mx-2" alt="..." />
        <img src="<?= base_url('img/Televisi.png') ?>" class="rounded mx-2" alt="..." />
        <img src="<?= base_url('img/Paket-Data.png') ?>" class="rounded mx-2" alt="..." />
      </div>
    </div>

    <div class="mt-5">
      <label class="mx-4 mb-3">Temukan promo menarik</label>
    </div>
    <div class="col-12">
      <img src="<?= base_url('img/Banner 1.png') ?>" class="rounded" alt="..." />
      <img src="<?= base_url('img/Banner 2.png') ?>" class="rounded" alt="..." />
      <img src="<?= base_url('img/Banner 3.png') ?>" class="rounded" alt="..." />
      <img src="<?= base_url('img/Banner 4.png') ?>" class="rounded" alt="..." />
    </div>

    <div class="mb-5"></div>
    <!-- Optional JavaScript; choose one of the two! -->

    <div class="text-center p-4" style="background-color: #f42619"></div>
    <!-- Copyright -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <script>
      function toggleVisibility() {
    var numberElement = document.getElementById('hiddenNumber');
    if (numberElement.style.display === 'none') {
        numberElement.style.display = 'inline';
    } else {
        numberElement.style.display = 'none';
    }
}

    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
