<?php 
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
if(isset($_POST["simpan"])){
    $_SESSION["id_editbuku"];
    $idbook = $_SESSION["id_editbuku"];
    $tag = $_POST["tag"];
    $coverlama = $_POST["coverlama"];
    if(empty($_POST["judul"])){
        header("Location: index.php?include=editbuku&edit=gagal");
    }
    // else if(empty($_POST["pilihkb"])){
    //     header("Location: index.php?include=editbuku&edit=gagal");
    // }
    // else if(empty($_POST["penerbit"])){
    //     header("Location: index.php?include=editbuku&edit=gagal");
    // }
    // else if(empty($_POST["pengarang"])){
    //     header("Location: index.php?include=editbuku&edit=gagal");
    // }
    // else if(empty($_POST["tanggal"])){
    //     header("Location: index.php?include=editbuku&edit=gagal");
    // }
    // else if(empty($_POST["sinopsis"])){
    //     header("Location: index.php?include=editbuku&edit=gagal");
    // }
    else {
            $lokasi_file = $_FILES['cover']['tmp_name'];
            $nama_file = $_FILES['cover']['name'];
            $direktori = 'cover/'.$nama_file;
            if (!empty($nama_file)){
                move_uploaded_file($lokasi_file,$direktori);
                unlink("cover/$coverlama");
                $sqledit = "UPDATE `buku` SET `id_kategori_buku`='$_POST[opsikb]',
                            `judul`='$_POST[judul]',
                            `pengarang`='$_POST[pengarang]',
                            `id_penerbit`='$_POST[opsipb]',
                            `tahun_terbit`='$_POST[tanggal]',
                            `sinopsis`='$_POST[sinopsis]', 
                            `cover`='$nama_file' WHERE  id_buku = '$_SESSION[id_editbuku]'; ";
                mysqli_query($koneksi, "DELETE FROM tag_buku WHERE id_buku = $idbook");
                foreach ($tag as $tag) {
                    $sql_tag = "INSERT INTO tag_buku VALUES ('', $idbook, $tag )";
                     mysqli_query($koneksi, $sql_tag);
                }
                
            }
            else{
                $sqledit = "UPDATE `buku` SET `id_kategori_buku`='$_POST[opsikb]',
                            `judul`='$_POST[judul]',
                            `pengarang`='$_POST[pengarang]',
                            `id_penerbit`='$_POST[opsipb]',
                            `tahun_terbit`='$_POST[tanggal]',
                            `sinopsis`='$_POST[sinopsis]'
                            WHERE  id_buku = '$_SESSION[id_editbuku]'; ";
                mysqli_query($koneksi, "DELETE FROM tag_buku WHERE id_buku = $idbook");
                foreach ($tag as $tag) {
                    $sql_tag = "INSERT INTO tag_buku VALUES ('',  $idbook, $tag) ";
                     mysqli_query($koneksi, $sql_tag);
                }
            }
         mysqli_query($koneksi, $sqledit);
        
        header("Location: buku-edit=berhasil-tag='$_POST[tag]'");
    }
}



?>