<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'katalog_buku_new');
if (!$koneksi)
    {
        die ('Error Koneksi' . mysqli_connect_errno());
    }
?>