<?php 
if (isset($_POST["submit"])){
    if(empty($_POST["kategoriblog"])){
        header("Location: index.php?include=tambahkategoriblog&tambah=gagal");
    }
    else{
        mysqli_query($koneksi,"INSERT INTO `kategori_blog` VALUES ('', '$_POST[kategoriblog]')");
        header("Location: index.php?include=kategoriblog&tambah=berhasil");
    }
}

?>