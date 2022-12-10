<?php 
    if (isset($_POST["tambah"])){

        if(empty($_POST["penerbit"])){
            header("Location: tambahpenerbit-tambah=gagal");
        }
        else{
            $sql_tambahpenerbit = "INSERT INTO `penerbit` VALUES ('', '$_POST[penerbit]', '$_POST[alamat]')";
            $query_tambahpenerbit = mysqli_query($koneksi, $sql_tambahpenerbit);
            header("Location: penerbit-tambah=berhasil");
        }


    }
?>