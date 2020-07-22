<?php 
    $conn = mysqli_connect("localhost","root","","pemilu");
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $datacalons = [];
        while($datacalon = mysqli_fetch_assoc($result)){
            $datacalons[] = $datacalon;
        }
        return $datacalons;
    }

    function tambahCalon($tambahcalon){
        global $conn;
        $nama = htmlspecialchars($tambahcalon["nama"]);
        $NIM = htmlspecialchars($tambahcalon["NIM"]);
        $Ttl = htmlspecialchars($tambahcalon["Ttl"]);
        $Hobi = htmlspecialchars($tambahcalon["Hobi"]);
        $visi = htmlspecialchars($tambahcalon["visi"]);
        // upload gambar
        $gambar = upload();
        if (!$gambar) {
            # code...
            return false;
        }
        // $gambar = $tambahcalon["gambar"];

        $query = "INSERT INTO calon VALUES ('','$nama','$NIM','$Ttl',
        '$Hobi','$visi','$gambar')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek upload gambar or not
        if ($error === 4) {
            # code...
            echo "<script>
                alert('Pilih gambar terlebih dahulu');
            </script>";
            return false;
        }

        // cek gambar or not
        $ekstensiGambarValid = ['jpg','jpeg','png'];
        $ekstensiGambar = explode('.',$namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
            echo "<script>
                alert('Yang anda upload bukan gambar!!');
            </script>";
            return false;
        }
        //cek ukuran
        if ($ukuranFile > 5242880) {
            echo "<script>
                alert('ukuran file terlalu besar!!');
            </script>";
            return false;
        }

        //generated nama baru
        $namaFileBaru = uniqid();
        $namaFileBaru .='.';
        $namaFileBaru .=$ekstensiGambar;
        //siap upload
        move_uploaded_file($tmpName, '../images/'.$namaFileBaru);
        return $namaFileBaru;
    }

    function hapusCalon($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM calon WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    function ubahCalon($ubahcalon){
        global $conn;
        $id = $ubahcalon["id"];
        $nama = htmlspecialchars($ubahcalon["nama"]);
        $NIM = htmlspecialchars($ubahcalon["NIM"]);
        $Ttl = htmlspecialchars($ubahcalon["Ttl"]);
        $Hobi = htmlspecialchars($ubahcalon["Hobi"]);
        $visi = htmlspecialchars($ubahcalon["visi"]);
        $gambarLama = $ubahcalon["gambarLama"];

        //cek user uplad gambar or not
        if ($_FILES['gambar']['error']===4) {
            $gambar = $gambarLama;
        }else{
            $gambar = upload();
        }

        $query = "UPDATE calon SET nama = '$nama',NIM = '$NIM',Ttl = '$Ttl',
        Hobi = '$Hobi',visi = '$visi',gambar = '$gambar' WHERE id = '$id'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);


    }

    function cariCalon($keywordCalon){
        $query = "SELECT * FROM calon WHERE 
        nama like '%$keywordCalon%' OR
        NIM like '%$keywordCalon%' OR
        Ttl like '%$keywordCalon%' OR
        Hobi like '%$keywordCalon%' OR
        visi like '%$keywordCalon%' OR
        gambar like '%$keywordCalon%'
        ";
        return query($query);
    }

    function tambahUser($tambahuser){
        global $conn;
        $nama = htmlspecialchars($tambahuser["nama"]);
        $NIK = htmlspecialchars($tambahuser["NIK"]);
        $email = htmlspecialchars($tambahuser["email"]);

        $query = "INSERT INTO user VALUES ('','$nama','$NIK','$email')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function hapusUser($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM user WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

    function ubahUser($ubahuser){
        global $conn;
        $id = $ubahuser["id"];
        $nama = htmlspecialchars($ubahuser["nama"]);
        $NIK = htmlspecialchars($ubahuser["NIK"]);
        $email = htmlspecialchars($ubahuser["email"]);

        $query = "UPDATE user SET nama = '$nama',NIK = '$NIK',
        email = '$email' WHERE id = '$id'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function cariUser($keywordUser){
        $query = "SELECT * FROM user WHERE 
        nama like '%$keywordUser%' OR
        NIK like '%$keywordUser%' OR
        email like '%$keywordUser%'
        ";
        return query($query);
    }
