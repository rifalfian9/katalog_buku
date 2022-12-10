<?php 
    if(isset($_POST["simpan"])){
        if(empty($_POST["judul"])){
            header("Location: editkonten-edit=gagal");
        }
        else{
            mysqli_query($koneksi, "UPDATE `konten` SET `judul` = '$_POST[judul]', `isi` = '$_POST[sinopsis]'
            where `id_konten` = '$_SESSION[id]'
            ");
            header("Location: konten-edit=berhasil");
        }
    }

?>