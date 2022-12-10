<?php error_reporting(E_ALL ^ E_WARNING || E_NOTICE) ?>
<?php
    include("../koneksi/koneksi.php");
    $rowid = $_GET["idkb"] ;
    $sql_hapuskategori = "DELETE `kategori_buku` FROM `kategori_buku` WHERE `id_kategori_buku` = '$rowid'";
   // echo $sql_hapuskategori;
    mysqli_query($koneksi,$sql_hapuskategori);
    
    header("Location: kategori-buku-hapus=berhasil");


?>