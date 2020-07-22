<?php
include '../function.php';

$idcalon = $_POST['id_calon'];

$sql = mysqli_query($conn, "INSERT INTO vote VALUES('','$idcalon')");

if ($sql) {
    echo '<script>alert("Vote telah direkam, Terimakasih."); document.location="index.php";</script>';
   session_start();
   $_SESSION = [];
   session_unset();
   session_destroy();
   echo "<meta http-equiv='refresh' content='2; url=index.php'>";
} else {
    echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
}
