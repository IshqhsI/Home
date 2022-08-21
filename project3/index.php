<?php

  require '../koneksi.php';
  require '../functions.php';
  
  if (isset($_POST["search"])){
    $keyword = $_POST["keyword"];
    $produk = query("SELECT * FROM `produk` WHERE `nama_barang` LIKE '%$keyword%'");
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>Cek Harga</title>
    <style>
      .title {
        font-size: 100px;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande',
          'Lucida Sans', Arial, sans-serif;
        margin-top: 6rem;
      }
      .form-control {
        border: 1px solid #000;
        width: 50%;
        display: inline-block;
      }

      @media screen and (max-width: 798px) {
        .title {
          font-size: 70px;
          font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande',
            'Lucida Sans', Arial, sans-serif;
          margin-top: 5rem;
        }
        .form-control {
          border: 1px solid #000;
          width: 80%;
          display: inline-block;
        }
      }
    </style>
  </head>
  <body class="bg-dark">
    <div class="container-fluid">
      <h1 class="text-center title">
        <span class="k text-danger">C</span><span class="a text-warning">e</span
        ><span class="d text-success">k</span
        ><span class="i text-primary">H</span><span class="t text-info">a</span
        ><span class="a text-light">r</span><span class="k text-danger">g</span
        ><span class="a text-warning">a</span>
      </h1>
      <div class="container-fluid text-center mx-auto mt-5">
        <form action="" method="post">
          <input
            type="text"
            class="form-control mx-auto"
            id="keyword"
            name="keyword"
            placeholder="Nyari apa hah"
            autofocus
          />
          <button
            class="btn mb-1 bg-light"
            style="padding: 2.4px"
            name="search"
            id="button-search"
          >
            <img src="cari.png" alt="" style="width: 30px" />
          </button>
        </form>

        <br /><br />

        <div>
          <h1 id="tes" class="text-light"></h1>
        </div>


        <div id="container">
        </div>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
