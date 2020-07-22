<?php
session_start();
if(!isset($_SESSION["loginAdmin"])){
    header('location: ../index.php');
    exit;
}
require ('../function.php');
$calons = query("SELECT * FROM calon");
$votes = query("SELECT calon.*,COUNT(id_calon) as HasilVoting
FROM vote JOIN calon ON vote.id_calon = calon.id
GROUP BY calon.id");
// var_dump($votes);
// die;
$users = query("SELECT * FROM user");

if (isset($_POST["cariUser"])) {
    # code...
    $users = cariUser($_POST["keywordUser"]);
}
if (isset($_POST["cariCalon"])) {
    # code...
    $calons = cariCalon($_POST["keywordCalon"]);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Pemilu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
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
                <a class="btn tombol" href="../logout.php">Logout</a>
            </div>
            </div>
        </div>
      </nav>
<!-- user -->
    <div class="jumbotron jumbotron-fluid about" id="about">
        <div class="container">
          <h1 class="display-4 text-center">Data users</h1>
          <a class="btn tombol mb-4" href="../user/tambahUser.php">Tambah data</a>
          <a class="btn tombol mb-4" href="../cetak.php" target="_blank">Print</a>
        <form action="" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="keywordUser">Cari</label>
                <div class="col-sm-8">
                    <input type="text" name="keywordUser" id="keywordUser" class="form-control" placeholder="Masukan data yang dicari">
                </div>
                <button class="btn tombol col-sm-2" type="submit" name="cariUser" >Cari</button>
            </div>
        </form>
          <table class="table table-dark dataUser">
            <thead class="thead-dark">
              <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tb>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach($users as $user) :?>
                    <tr>
                        <td><?= $i?></td>
                        <td><?= $user["nama"]?></td>
                        <td><?= $user["NIK"]?></td>
                        <td><?= $user["email"]?></td>
                        <td>
                            <a href="../user/ubahUser.php?id=<?= $user["id"]?>" class="btn btn-warning">Edit</a>
                            <a href="../user/hapusUser.php?id=<?= $user["id"] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                    <?php $i++;?>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="8" style="text-align: center"><b>Tidak ada data.</b></td>
                    </tr>
                <tbody>
            </table>
        </div>
    </div>
    <!-- end user -->
    <!-- tabel calom -->
    <div class="jumbotron jumbotron-fluid fitur" id="about">
    <div class="container">
        <h1 class="display-4 text-center">Data calon</h1>
        <a class="btn tombol mb-4" href="tambahCalon.php">Tambah data</a>
        <a class="btn tombol mb-4" href="../cetak2.php" target="_blank">Print</a>
        <form action="" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="keywordCalon">Cari</label>
                <div class="col-sm-8">
                    <input type="text" name="keywordCalon" id="keywordCalon" class="form-control" placeholder="Masukan data yang dicari">
                </div>
                <button class="btn tombol col-sm-2" type="submit" name="cariCalon" >Cari</button>
            </div>
        </form>
        <table class="table table-dark dataUser">
        <thead class="thead-dark">
            <tr>
            <th scope="col">NO</th>
            <th scope="col">Nama</th>
            <th scope="col">NIM</th>
            <th scope="col">Tempat, tanggal lahir</th>
            <th scope="col">Hobi</th>
            <th scope="col">Visi</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tb>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach($calons as $c) :?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $c["nama"] ?></td>
                    <td><?= $c["NIM"] ?></td>
                    <td><?= $c["Ttl"] ?></td>
                    <td><?= $c["Hobi"] ?></td>
                    <td><?= $c["visi"] ?></td>
                    <td>
                        <a href="ubahCalon.php?id=<?= $c["id"] ?>" class="btn btn-warning">Edit</a>
                        <a href="hapusCalon.php?id=<?= $c["id"] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </tr>
                <?php $i++;?>
                <?php endforeach ?>
                <tr>
                    <td colspan="8" style="text-align: center"><b>Tidak ada data.</b></td>
                </tr>
            <tbody>
        </table>
        <h1 class="display-4 text-center">Hasil Voting</h1>
        <a class="btn tombol mb-4" href="../cetak3.php" target="_blank">Print</a>
        <table class="table table-dark dataUser">
        <thead class="thead-dark">
            <tr>
            <th scope="col">NO</th>
            <th scope="col">Nama</th>
            <th scope="col">Hasil Voting</th>
            </tr>
        </thead>
        <tb>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach($votes as $v) :?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $v["nama"]; ?></td>
                    <td><?= $v['HasilVoting']; ?></td>
                </tr>
                <?php $i++;?>
                <?php endforeach ?>
                <tr>
                    <td colspan="8" style="text-align: center"><b>Tidak ada data.</b></td>
                </tr>
            <tbody>
        </table>
        </div>
    </div>
    <!-- end tabel -->
    <!-- footer -->
        <footer>
            <div class="container">
              <center>&copy; Copyright by our Team 2020</center>
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