<?php
 mysqli_query($koneksi, "DELETE FROM `kategori_blog` where id_kategori_blog = '$_GET[idkb]'");
 header("Location: kategoriblog-hapus=berhasil");





?>