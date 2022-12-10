<?php 
if(isset($_POST["simpan"])){
    if(empty($_POST["kategoriblog"])){
        header("Location: editkategoriblog-edit=gagal");
    }
    else{
        mysqli_query($koneksi, "UPDATE `kategori_blog` SET `kategori_blog` = '$_POST[kategoriblog]' WHERE `id_kategori_blog` = '$_SESSION[id_kategori_blog]'");
        header("Location: kategoriblog-edit=berhasil");
    }
}



?>