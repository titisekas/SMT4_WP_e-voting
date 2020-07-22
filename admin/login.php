<?php 

session_start();
if(isset($_SESSION["loginAdmin"])){
    header('location: index.php');
    exit;
}
require ('../function.php');
if (isset($_POST["login"])) {
 
$username = $_POST["username"];
$password = $_POST["password"];

$query = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
// $data = mysqli_fetch_array($query);
// $jml = mysqli_num_rows($query);

if(mysqli_num_rows($query) === 1){
    // $_SESSION['username'] = $data['username'];
    // $_SESSION['password'] = $data['password'];
    $row = mysqli_fetch_assoc($query);
    if ($password = $row["password"]) {
        $_SESSION["loginAdmin"] = true;
        header('location: index.php');
        exit;
    }
}else{
    echo "<p align='center'>Login Gagal</p>";
    echo "<p align='center'>Username atau Password salah!!!</p>";
    echo "<meta http-equiv='refresh' content='2; url=login.php'>";
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemilu oioi!!</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
        <p>&larr; <a href="../index.php">Home</a>
        <h4>Masuk ke Pemilu sebagai admin</h4>
        <?php if (isset($error)):?>
            <h3>Password atau Username salah</h3>
        <?php endif;?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>
            <input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />
        </form>            
        </div>
        <div class="col-md-6">
            <!-- isi dengan sesuatu di sini -->
        </div>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<style>
body{
    height: auto;
    background: rgb(90, 91, 92);
    color: rgb(236, 232, 232);
    /* display: flex; */
    justify-content: center;
    align-items: center;
}
</style>
</html>