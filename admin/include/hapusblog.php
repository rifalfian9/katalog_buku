<?php
    mysqli_query($koneksi, "DELETE FROM blog WHERE id_blog = '$_GET[idkb]' ");

    header("Location: blog-hapus=berhasil");
?>