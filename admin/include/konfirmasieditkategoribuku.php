<?php 
include("../koneksi/koneksi.php");
session_start();


if (isset($_POST["confirm"])){

    if(!empty($_POST["update"])){
         $sql_ekt = " UPDATE `kategori_buku` SET
            `kategori_buku`= '$_POST[update]' WHERE
            `id_kategori_buku` = '$_SESSION[idkb]' " ;
            mysqli_query($koneksi, $sql_ekt);
            unset( $kategori_value);
            header("Location: kategori-buku-edit=berhasil");
    }
    else {
      header ("Location: editkategoribuku-nama=kosong");
    }
        }


?>