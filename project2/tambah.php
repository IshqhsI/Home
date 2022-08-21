<?php
    require '../koneksi.php';
    require '../functions.php';

    if (isset($_POST["submit"])){
        if (tambah($_POST) > 0 )   {
            header("Location: tambah.php");
        } else {
            echo "
                sc
            ";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <title> Tambah Produk </title>

    <style>
        .mine{
            width: 400px;
            border-radius: 12px;
        }
        label{
            margin-left: 1.5rem;
            margin-bottom: 10px;
        }
        .form-control{
            width: 90%;
            background-color: #212529;
            color: #fff;
            margin: auto;
            margin-bottom: 1rem;
        }.form-control:focus{
            width: 90%;
            background-color: #212529;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container bg-dark mt-4 text-light mine" >

        <h2 class="py-5 text-center"> Tambah Produk </h2>    

        <form action="" method="post" enctype="multipart/form-data">
            <label for="namaproduk">Nama Produk</label>
            <input type="text" class="form-control" id="namaproduk" name="namaproduk">

            <label for="kodeproduk">Kode Produk</label>
            <input type="text" class="form-control" id="kodeproduk" name="kodeproduk">

            <label for="harga"> Harga </label>
            <input type="text" class="form-control" id="harga" name="harga">

            <label for="kategori"> Kategori </label>
            <input type="text" class="form-control" id="kategori" name="kategori">

            <label for="gambar"> Gambar </label>
            <input type="file" class="form-control" id="gambar" name="gambar">

            <br>
            <button type="submit" name="submit" class="btn btn-outline-light mb-4" style="margin: auto; display: block;"> Submit </button>
            <br>

        </form>
    </div>
    
    
</body>
</html>