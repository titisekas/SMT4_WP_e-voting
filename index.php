<?php
require 'function.php';
$calons = query("SELECT * FROM calon");
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="css/style.css">
    <title>Pemilu</title>
  </head>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">WP1</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="#about">Home</a>
                <a class="nav-item nav-link" href="#fitur">Features</a>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Login
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="user/login.php">Login User</a>
                    <a class="dropdown-item" href="admin/login.php">Login Admin</a>
                  </div>
                </div>
             </div>
            </div>
        </div>
      </nav>
    <!-- akhir navbar -->
    <!-- about -->
    <div class="jumbotron jumbotron-fluid about" id="about">
        <div class="container">
          <h1 class="display-4 text-center">Pemilu</h1>
          <p class="lead">Pemilihan apa aja yang kalian pengen
          </p>
        </div>
    </div>
    <!-- akhir about -->
    <!-- fitur -->
    <div class="jumbotron jumbotron-fluid fitur" id="fitur">
        <div class="container">
            <h1 class="display-4 text-center">Calon Kandidat</h1>
            <div class="row kartu">
            <?php foreach($calons as $calon) : ?>
                <div class="col-md-3">
                  <div class="card">
                     <img src="images/<?= $calon["gambar"]; ?>" class="card-img-top img-thumbnail" alt="...">
                        <div class="card-body">
                           <h5 class="card-title"><?= $calon["nama"] ?></h5>
                           <p class="card-text">Visi : <?= $calon["visi"] ?></p>
                        <a href="#" class="btn tombol">detail</a>
                    </div>
                  </div>
               </div>
               <?php endforeach?>
            </div>
        </div>
    </div>
    <!-- akhir fitur -->
    <!-- footer -->
        <footer>
            <div class="container">
                <center>&copy; Copyright by our team 2020</center>
            </div>
        </footer>
    <!-- akhir footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>