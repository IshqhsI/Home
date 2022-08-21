<?php
    require '../koneksi.php';
    require '../functions.php';

    $id = $_GET["id"];
    $tabel = "`todolist`";    
    if (hapus($id, $tabel) > 0 ){
        header("Location: index.php");
    }
    

?>