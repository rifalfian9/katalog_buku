<?php 

if(isset($_POST["simpan"])){
    if (empty($_POST["passlama"])){
        header("Location: ubahpassword-gagal=kosong");
    }
    else {
        $sql_lamapass = "SELECT *FROM `user` WHERE `id_user` = '$_SESSION[id_user]' ";
        $query_lamapass = mysqli_query($koneksi,$sql_lamapass);
        while ($data_lamapass = mysqli_fetch_assoc($query_lamapass)) {
            $passlama = $data_lamapass["password"];
        }
        $passambil = mysqli_real_escape_string($koneksi,MD5($_POST["passlama"]) ) ;
        if ($passambil != $passlama){
            header("Location: ubahpasssword-gagal=tidaksama");
        }
        
        else if ($passambil == $passlama) {
            if($_POST["passbaru"] == $_POST["konpassbaru"] ){
                $passkonfirm =MD5($_POST["konpassbaru"]);
                $sql_konpassbaru = "UPDATE `user` SET `password` = '$passkonfirm' WHERE `id_user` = '$_SESSION[id_user]' ";
                mysqli_query($koneksi, $sql_konpassbaru);
                header("Location: ubahpassword-ganti=sukses");
                }
            else if (empty($_POST["passbaru"])){
                 header("Location: ubahpassword-gagal=konpasserror");
            }
        }
        
  
} 
        }
   
?>

