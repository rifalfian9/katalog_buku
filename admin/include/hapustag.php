<?php

mysqli_query($koneksi, "DELETE FROM `tag` WHERE `id_tag`='$_GET[idkb]'");
header("Location: tag-hapus=berhasil");


?>