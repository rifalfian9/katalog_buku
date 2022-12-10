<?php
if (isset($_POST["tambah"])){
    if (empty($_POST["judul"])){
        header("Location: tambahbuku-tambah=gagal");
    }
    else{
        $_tag = $_POST["pilihtag"];
        $lokasi_file = $_FILES['cover']['tmp_name'];
        $nama_file = $_FILES['cover']['name'];
        $direktori = 'cover/'.$nama_file;
        if (!empty($nama_file)) {
            move_uploaded_file($lokasi_file,$direktori);
            mysqli_query($koneksi, "INSERT INTO `buku` VALUES 
            ('','$_POST[pilihkb]',
            '$_POST[judul]',
            '$_POST[pengarang]',
            '$_POST[penerbit]', 
            '$_POST[tanggal]',
            '$_POST[sinopsis]', 
            '$nama_file' )");

            $idbook = mysqli_insert_id($koneksi);
            foreach ($_tag as $tagbuku ) {
                mysqli_query($koneksi,"INSERT INTO `tag_buku` VALUES ('', $idbook, $tagbuku) ");
            }
            
            header("Location: buku-tambah=berhasil");
        }
        else {
             mysqli_query($koneksi, "INSERT INTO `buku` VALUES 
            ('','$_POST[pilihkb]',
            '$_POST[judul]',
            '$_POST[pengarang]',
            '$_POST[penerbit]', 
            '$_POST[tanggal]',
            '$_POST[sinopsis]' )");

            $idbook = mysqli_insert_id($koneksi);
            foreach ($_tag as $tagbuku) {
                mysqli_query($koneksi,"INSERT INTO `tag_buku` VALUES ('', $idbook, $_tag) ");
            }
            
            
            header("Location: buku-tambah=berhasil");
        }



    }


}

?>