<?php 
    session_start();
    if(!isset($_SESSION["loginAdmin"])){
        header('location: ../index.php');
        exit;
    }
    require '../function.php';
    $id = $_GET["id"];

    if (hapusCalon($id) > 0) {
        # code...
        echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
        }else{
            echo '<div class="alert alert-warning">Gagal melakukan proses hapus data. </div>';
        }
?>