<?php
    if(isset($_POST["simpan"])){
        if(empty($_POST["tag"])){
            header("Location: edittag-edit=gagal");
        }
        else{
            mysqli_query($koneksi, "UPDATE `tag` SET `tag`= '$_POST[tag]' where `id_tag` = '$_SESSION[id]' ");
            header("Location: tag-edit=berhasil");
        }
    }


?>