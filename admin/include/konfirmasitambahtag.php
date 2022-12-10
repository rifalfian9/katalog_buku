<?php
    if(isset($_POST["tambah"])){
        if(empty($_POST["namatag"])){
            header("Location: tambahtag-tambah=gagal");
        }
        else {
            $query_tambahtag = mysqli_query($koneksi, "INSERT INTO `tag` ValUES ('', '$_POST[namatag]')");
            header("Location: tag-tambah=berhasil");
        }
    }
    


?>