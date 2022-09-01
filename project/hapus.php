<?php
    require '../koneksi.php';
    require '../functions.php';

    $id = $_GET["id"];
    $tabel = $_GET["todo"];

    if (hapus($id, $tabel) > 0 ){
        header("Location: index.php");
    }
    

?>