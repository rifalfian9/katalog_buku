<?php
error_reporting(E_ALL ^ E_WARNING || E_NOTICE); 
if (isset($_POST["submit"])) {
    if (empty($_POST["judul"])){
        header("Location: editblog-edit=gagal");
    }
    else{
        mysqli_query($koneksi, 
        "UPDATE blog SET `judul` = '$_POST[judul]',
                         `id_kategori_blog` = '$_POST[opsi]',
                         `isi` ='$_POST[isi]'
                         WHERE `id_blog` = '$_SESSION[ideditblog]'
                         ");
        header("Location: blog-edit=berhasil");
    }
}








?>