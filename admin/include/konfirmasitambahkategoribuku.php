<?php error_reporting(E_ALL ^ E_WARNING || E_NOTICE) ?>
<?php

//include ("../koneksi/koneksi.php");
       $kategoribaru = $_POST["kategoribuku"];


       if(isset($_POST["tambah"])){
          if(empty($kategoribaru)){
            header("Location: tambahkategoribuku-tambah=gagal");
          }else{
            $sql = "INSERT INTO `kategori_buku`  
            values ('', '$kategoribaru')";
            mysqli_query($koneksi,$sql);

            header("Location: kategori-buku-tambah=berhasil");

          }
  

      }


    
?>