<?php 
 if (isset($_POST['login'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $username = mysqli_real_escape_string($koneksi, $user);
        $password = mysqli_real_escape_string($koneksi, MD5($pass));
        
        //cek username dan password
        $sql="select `id_user`, `levels` from `user` 
                where `username`='$username' and
               `password`='$password'";
        $query = mysqli_query($koneksi, $sql);
        $jumlah = mysqli_num_rows($query);
        if(empty($user)){
            header("Location: login-gagal=userkosong");
        }else if(empty($pass)){
            header("Location: login-gagal=passkosong");
        }else if($jumlah==0){
            header("Location: login-gagal=userpasssalah");
        }else{
            //get data
            while($data = mysqli_fetch_row($query)){
                $id_user = $data[0]; //1
                $level = $data[1]; //speradmin

                if ($level == "superadmin"){
                    $_SESSION['id_user']=$id_user;
                    $_SESSION['levels']="superadmin";
                }
                else if ($level == "admin"){
                $_SESSION['id_user']=$id_user;
                $_SESSION['levels']="admin";
                }
                header("Location:profil");
            }           
        }
    }



?>