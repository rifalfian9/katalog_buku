<?php
    mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = '$_GET[idkb]' ");

    header("Location: buku-hapus=berhasil");
?>