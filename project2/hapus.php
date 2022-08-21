<?php
    require '../koneksi.php';
    require '../functions.php';

    $id = $_GET["id"];

    if(isset($id)){   
        
        $tabel = "`produk`";
        if (hapus($id, $tabel) > 0 ){
            header("Location: price.php");
        }
    }

?>