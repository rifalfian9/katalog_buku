<?php 
include("../koneksi/koneksi.php");
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
session_start();
if(isset($_POST['submit'])){
    
        $password= mysqli_real_escape_string($koneksi,MD5($_POST["password"]) )  ;

        $lokasi_file = $_FILES['foto']['tmp_name'];
        $nama_file = $_FILES['foto']['name'];
        $direktori = 'foto/'.$nama_file;
        

        if(!empty($_POST["nama"] && $_POST["email"] && $_POST['username'] && $_POST['username'] && $_POST['password'] && $nama_file)){
                move_uploaded_file($lokasi_file,$direktori);
                $sql_tambahuser = "INSERT INTO `user`(`id_user`, `nama`, `email`, `username`, `password`, `levels`, `foto`) VALUES 
                ('','$_POST[nama]','$_POST[email]','$_POST[username]',
                '$password','$_POST[level]','$nama_file')";
                mysqli_query($koneksi, $sql_tambahuser);

                header ("Location: user-tambah=berhasil");
             }
        else {
        header ("Location: tambahuser-tambah=gagal");
         }
        

    }
        
   

?>