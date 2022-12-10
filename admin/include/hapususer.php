<?php
include("../koneksi/koneksi.php");
error_reporting(E_ALL ^ E_WARNING || E_NOTICE) ;
    $sql_hapususer = "DELETE FROM `user` WHERE `id_user` = '$_GET[idu]' ";
    mysqli_query($koneksi, $sql_hapususer);

    header("Location: user-hapus=berhasil");

?>