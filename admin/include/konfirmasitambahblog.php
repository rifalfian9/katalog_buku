<?php
    if (isset($_POST["submit"])){
        if (empty($_POST["judul"])) {
            header("Location: tambahblog-tambah=gagal");
        }
        else {
             
            $query = mysqli_query($koneksi,  "INSERT INTO `blog` (`id_blog` , `id_kategori_blog` , `id_user`, `tanggal`, `judul`, `isi` )
            VALUES ('', 
            '$_POST[pilih]',
            '$_POST[penulis]',
            '$_POST[tanggal]',
            '$_POST[judul]',
            '$_POST[isi]' )");
            
            header("Location: blog-tambah=berhasil");
        }
    }

?>