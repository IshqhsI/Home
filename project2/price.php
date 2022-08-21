<?php

    require '../koneksi.php';
    require '../functions.php';


   

    $dataperhalaman = 12;
    $jumlahdata = count(query("SELECT * FROM `produk`"));
    $jumlahhalaman = ceil($jumlahdata / $dataperhalaman);
    $halaman = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    
    $awaldata = ($dataperhalaman * $halaman) - $dataperhalaman;
    
    $query = "SELECT * FROM `produk` LIMIT $awaldata, $dataperhalaman";
    $produk = query($query);
    
    

    if (isset($_POST["kategori"])){
        $kategori = $_POST["kategori"];
        $query = "SELECT * FROM `produk` WHERE `kategori` = '$kategori' ORDER BY `harga` ASC LIMIT $awaldata, $dataperhalaman ";
        
        $produk = query($query);
    }
    


   
    // Sort
    if (isset($_POST["sort"])){
        $produk = query("SELECT * FROM `produk` ORDER BY `harga` ASC LIMIT $awaldata, $dataperhalaman");
    }


    // Cari
     if (isset($_POST["cari"])){
        $query = "SELECT * FROM `produk`";
        $keyword = $_POST["keyword"];
            $query .= " WHERE `nama_barang` LIKE '%$keyword%'";
            // echo $query;
            
        $produk = query($query);
    }
   


    // Tambah Produk
    if (isset($_POST["tambah"])){
            header("Location: tambah.php");
    };
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title> Produk </title>
    <style>
        .mine{
            padding: 0;
            background-color: #212529;
        }
        .navbar{
            background-color: #404040;
            opacity: 1;
            color: #fff;
        }
        .navbar-brand{
            font-family: Verdana;
        }
        .nav-link{
            color: #fff;
            margin-right: 3rem;
            font-family: Helvetica;
        }
        .active{
            color: lightblue;
        }

        .tabel{
            border: 0px solid #000;
            margin: 0;
            overflow-x: auto;
        }
        .tabel td, th, tr{
            text-align: center;
            overflow-x: auto;
            font-size: 14px;
            width: 85%;
            border: 1px solid #000;
            justify-content: center;
            display: flex;
        }
        .tabel th{
            padding: 20px 0;
        }
        a{
            text-decoration: none;
        }
        .page{
            color: #212529;
            display: inline-block;
            padding: 5px 12px;
            border-radius: 10px;
            background-color: #0dcaf0;
        }

    </style>
</head>

<body>
    <div class="container mine">
        <nav class="navbar navbar-expand-lg px-0">
            <a href="" class="navbar-brand text-light ms-5">
                Zaydun
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="" role="button" ><i class="fa fa-bars" aria-hidden="true" style="color: #130d0d;"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto text-dark">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            Contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="price.php" class="nav-link active">
                            Produk
                        </a>
                    </li>
                    
                </ul>
            </div>
        </nav>

        <div class="container text-light" style="padding: 0;">

            <div class="container-fluid" style="padding: 6;">

                <form action="" method="post">
                    <input type="text" class="mt-5 form-control" name="keyword" id="keyword" autofocus style="display: block; width: 20%">
                    <button class="btn btn-warning" name="cari" id="cari"> Cari </button>
                    <button class="btn btn-outline-light mt-2 mb-2" type="submit" name="sort"> Sort </button>

                    <button class="btn btn-success" value="Rokok" name="kategori">  Rokok </button>
                    <button class="btn btn-danger" value="Minuman" name="kategori"> Minuman </button>
           
                    <br>
                    <button class="btn btn-secondary mb-2 mt-2" name="tambah"> Tambah Produk </button>
                   

                </form>
                <table class="table table-sm table-info tabel">
                    <tr>
                        <th scope="col">
                            No. 
                        </th>
                        <th>
                            Nama Produk
                        </th>
                        <th>
                            Kode Produk
                        </th>
                        <th>
                            Harga 
                        </th>
                        <th>
                            Gambar
                        </th>
                        <th>
                            Aksi
                        </th>
                    </tr>

                    
                    <?php $i = 1; ?>
                    <?php foreach($produk as $barang) :  ?>
                    <tr>
                        <td class="align-middle"> 
                            <?= $i ?> 
                        </td>
                        <td class="align-middle"> 
                            <?= $barang["nama_barang"] ?> 
                        </td>
                        <td class="align-middle"> 
                            <?= $barang["kode_barang"] ?> 
                        </td>
                        <td class="align-middle"> 
                            <?= "Rp. " .$barang["harga"]. ".000"; ?> 
                        </td>
                        <td class="align-middle"> 
                            <img src="assets/<?= $barang['gambar'] ?>" alt="" style="width: 40px; height: 50px;"> 
                        </td>
                        <td class="align-middle"> 
                            <a href="hapus.php?id=<?= $barang["id"] ?>"> 
                                <button class="btn btn-secondary" onclick="return confirm('Hapus ?')"> Hapus </button> 
                            </a> |  
                            <a href="ubah.php?id=<?= $barang["id"] ?>">
                                <button class="btn btn-light"> Ubah </button> 
                            </a>
                        </td>

                    </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                </table>
                <br>
                 <?php 
                        for ($i=1; $i <= $jumlahhalaman; $i++) { 
                    ?>
                    
                        <a href="?halaman=<?= $i?>">  
                            <p class="page"> <?= $i  ?> </p>
                        </a>
                    <?php
                        }
                    ?>

            </div>
            <br><br>
        </div>
            
        


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>