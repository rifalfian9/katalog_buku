<?php 


if (isset($_SESSION["idu"])){
if(isset($_POST["submit"])){
        $password = mysqli_real_escape_string($koneksi, MD5($_POST["password"])) ;
        $fotolama = $_POST["fotolama"];
        if(empty($_POST["nama"])){
        header("Location:edituser-edit=gagal");
        }
        else{
                $lokasi_file = $_FILES['foto']['tmp_name'];
                $nama_file = $_FILES['foto']['name'];
                $direktori = 'foto/'.$nama_file;
               
            if (!empty($nama_file)) { 
                move_uploaded_file($lokasi_file,$direktori);
                unlink("foto/$fotolama");
                $sql_edituser = "UPDATE `user` SET 
                                `nama`='$_POST[nama]',
                                `email`='$_POST[email]',
                                `username`='$_POST[username]',
                                `password`='$password',
                                `levels`='$_POST[level]',
                                `foto`='$nama_file'
                                WHERE 
                                `id_user`='$_SESSION[idu]'";
                
            }
            else {$sql_edituser = "UPDATE `user` SET 
                            `nama`='$_POST[nama]',
                            `email`='$_POST[email]',
                            `username`='$_POST[username]',
                            `password`='$password',
                            `levels`='$_POST[level]' WHERE 
                            `id_user`='$_SESSION[idu]'";
                

                
            }

            mysqli_query($koneksi, $sql_edituser);               
            header("Location: user-edit=berhasil");

            }
        
    }
}
?>