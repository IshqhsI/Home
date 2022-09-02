<?php

    require 'koneksi.php';
    


    function query($query){
        global $conn;

        $result = mysqli_query($conn, $query);

        $rows= [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }

        return $rows;
    }

    function register($data){
        global $conn;

        $username = $data["username"];
        $password = $data["password"];
        $password2 = $data["password2"];


        $hasil = mysqli_query($conn, "SELECT * FROM `admin` WHERE `username` = '$username'") ;
        $cekuser = mysqli_fetch_assoc($hasil);


        // Cek Username
        if ($cekuser){
            echo "
                <script>
                    alert('Username telah terdaftar');
                    document.location.href = 'register.php';
                </script>
                ";
        }

        // Cek Password
        if($password != $password2){
            echo "
                <script>
                    alert('Password tidak sama');
                    document.location.href = 'register.php';
                </script>
                ";
            die;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $addtabel = "CREATE TABLE `$username` (
            id INT AUTO_INCREMENT PRIMARY KEY,
            do varchar(255),
            user varchar(255)
        )";

        mysqli_query($conn, $addtabel);

        $query = "INSERT INTO `admin` VALUES (
                    '', '$username', '$password'   
                 )";
        mysqli_query($conn, $query);

       

        return mysqli_affected_rows($conn);
    }

    function login($data){
        global $conn;

        $username = $data["username"];
        $password = $data["password"];

        $cookie = isset($data['remme']) ? $data['remme'] : "off";

        $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE `username` = '$username' ");
        // $row = mysqli_fetch_assoc($result);        

        // Cek Username
        if (mysqli_num_rows($result)){

            $row = mysqli_fetch_assoc($result);

            // Cek Password
            if(password_verify($password, $row["password"])){

                $_SESSION["login"] = true;
                if ($cookie === "on") {
                    setcookie("id", $row["id"], time()+60*60*24*365);
                    setcookie("key", hash('sha256', $username), time()+60*60*24*365 );
                }

                echo "
                    <script>
                        alert('Login Sukses');
                        document.location.href = 'home/index.php';
                    </script>
                ";

            } else {
                echo "
                    <script>
                        alert('Password Salah');
                        document.location.href = 'login.php';
                    </script>
                ";
                die;
            }
        } else {
            echo "
            <script>
                alert('Username Salah');
            </script>
            ";
        }

        return mysqli_affected_rows($conn);

    }

    function getUser($id){
        global $conn;
        $result = query("SELECT `username` FROM `admin` WHERE `id` = $id");
        return $result[0]["username"];
    }

    // insert todolist
    function insert($data, $tabel){

        global $conn;
        $query = "INSERT INTO $tabel VALUES ('', '$data')";
        mysqli_query($conn, $query);

    }

    function hapus($data, $tabel){
        global $conn;
        
        if ($tabel == "admin") {
            $tabel = "todolist";
        }
        $query = "DELETE FROM `$tabel` WHERE `id` = $data";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function tambah($data){
        global $conn;

        $namaproduk = $data["namaproduk"];
        $kodeproduk = $data["kodeproduk"];
        $harga = $data["harga"];
        $kategori = $data["kategori"];

        $gambar = upload();

        if(!$gambar){
            echo "Gagal";
            return false;

        }

      
        $query = "INSERT INTO `produk` VALUES (
            '', '$namaproduk', '$kodeproduk', $harga, '$gambar', '$kategori'
        )";
        $result = mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);

        
    }

    function upload(){

        $namafile = $_FILES["gambar"]["name"];
        $ukuranfile = $_FILES["gambar"]["size"];
        // $error = $_FILES["gambar"]["error"];
        $tmp_Name = $_FILES["gambar"]["tmp_name"];

        // Cek Ekstensi
        $ekstensi = ["jpg", "jpeg", "png"];

        $eksfile = explode('.', $namafile);
        $eksfile = strtolower($eksfile[1]);

        if (!in_array($eksfile, $ekstensi)){
            echo "
                    <script>
                        alert('Tetot, Anda tidak mengupload gambar');
                    </script>
                ";
            return false;
        }

        // Cek Ukuran File
        if ($ukuranfile > 10000000){
            echo "
                    <script>
                        alert('Tetot, Ukuran File Terlalu Besar');
                    </script>
                ";
            return false;
        }

        // Buat Nama FIle Baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $eksfile;

        move_uploaded_file($tmp_Name, 'assets/'.$namafilebaru);
        return $namafilebaru;




    }

    function ubah($data, $id){

        global $conn;

        $namaproduk = $data["namaproduk"];
        $kodeproduk = $data["kodeproduk"];
        $harga = $data["harga"];
        $kategori = $data["kategori"];

        if ($_FILES['gambar']['error'] === 4){
            $row = mysqli_query($conn, "SELECT `gambar` FROM `produk` WHERE `id` = $id");
            $gambar = mysqli_fetch_assoc($row)["gambar"];
        } else {
            $gambar = upload();
        }

        $query = "UPDATE `produk` SET `nama_barang` = '$namaproduk', `kode_barang` = '$kodeproduk', `harga` = $harga, `kategori` = '$kategori', `gambar` = '$gambar' WHERE `id` = $id" ;
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    
    }

    function cari($keyword, $query){
        var_dump($query);

    }

?>