<?php 
    require '../../functions.php';
    require '../../koneksi.php';

    $keyword = $_GET["keyword"];
    $query = "SELECT * FROM `produk` WHERE `nama_barang` LIKE '%$keyword%'";
    $produk = query($query);
?>

        <div
            class="container-fluid text-center"
            style="
              display: inline-block;
              overflow-x: auto;
              margin: auto;
              width: 80%;
            "
          >
            <?php foreach ($produk as $barang) : ?>

            <div
              class="card mx-2 mt-3 text-center"
              style="
                width: 240px;
                display: inline-block;
                border: 4px solid #ffc107;
              "
            >
              <img src="../project2/assets/<?= $barang["gambar"]?>"
              class="card-img-top" alt="..." style="height: 240px; width: 100%;
              outline: 0"/>
              <div class="card-body bg-warning" style="padding: 0">
                <h5
                  class="card-title bg-light mt-2"
                  style="font-size: 16px; font-family: Calibri; padding: 5px 0"
                >
                  <?= $barang["nama_barang"] ?>
                </h5>
                <!-- <p class="card-text">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p> -->
                <button
                  href=""
                  class="btn btn-dark mt-3"
                  style="font-size: 16px; padding: 4px 8px"
                >
                  <?= "Rp. " . $barang["harga"] . ".000" ?>
                </button>
                <br />
                <br />
              </div>
            </div>

            <?php endforeach; ?>
          </div>
          <br />
          <br />
        </div>