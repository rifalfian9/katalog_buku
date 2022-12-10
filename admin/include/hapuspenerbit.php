<?php 
    include("../koneksi/koneksi.php");
    $sql_hapus = "DELETE  FROM `penerbit` WHERE `id_penerbit` = '$_GET[idkb]' ";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    header("Location: penerbit-hapus=berhasil")


?>