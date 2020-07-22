<?php
	session_start();
	if(!isset($_SESSION["loginAdmin"])){
		header('location: ../index.php');
		exit;
	}
	
    include('../function.php');

    $id = $_GET["id"];

    $getuser = query("SELECT * FROM calon WHERE id = $id")[0];

    if (isset($_POST["submit"])) {
        # code...
        
        if(ubahCalon($_POST) > 0){
            echo '<script>alert("Berhasil mengubah data."); document.location="index.php";</script>';
        }else{
            echo '<div class="alert alert-warning">Gagal melakukan proses ubah data. </div>';
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
<title>Ubah Calon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="admin/index.php">Home</a>

        <h4>Bergabunglah bersama ribuan orang lainnya dalam Pemilu tahun ini</h4>
        <h3>Ubah data calon</h3>

        <form action="" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<div class="col-sm-10">
					<input type="hidden" name="id" class="form-control" value="<?= $getuser["id"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-10">
					<input type="hidden" name="gambarLama" class="form-control" value="<?= $getuser["gambar"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label" for="nama">Nama</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" id="nama" required value="<?= $getuser["nama"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label" for="NIM">NIM</label>
				<div class="col-sm-10">
					<input type="text" name="NIM" id="NIM" class="form-control" required value="<?= $getuser["NIM"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label" for="TTL">TTL</label>
				<div class="col-sm-10">
					<input type="text" name="Ttl" id="TTL" class="form-control" required value="<?= $getuser["Ttl"]; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label" for="Hobi">Hobi</label>
				<div class="col-sm-10">
					<input type="text" name="Hobi" id="Hobi" class="form-control" required value="<?= $getuser["Hobi"]; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label" for="Visi">Visi</label>
				<div class="col-sm-10">
					<input type="text" name="visi" id="Visi" class="form-control" required value="<?= $getuser["visi"]; ?>">
				</div>
			</div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="foto">Foto</label>
				<div class="col-sm-6">
					<img src="../images/<?= $getuser["gambar"]; ?>" alt="" width="50%">
				</div>
				<div class="col-sm-4">
                    <input type="file" id="foto" name="gambar">
                </div>
            </div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
				</div>
			</div>
			</form>
            
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
	</script>
</body>
<style>
body{
    height: auto;
    background-color: rgb(41, 42, 43);
    color: rgb(236, 232, 232);
    /* display: flex; */
    justify-content: center;
    align-items: center;
}
</style>
</html>