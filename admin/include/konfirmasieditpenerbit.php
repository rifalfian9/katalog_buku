<?php 
if(isset($_POST["simpan"])){
    if (empty($_POST["namapenerbit"])){
        header("Location: editpenerbit-edit=gagal");
    }
    else{
        $sql_editpenerbit = "UPDATE `penerbit` SET
                            `penerbit` = '$_POST[namapenerbit]' ,
                            `alamat` = '$_POST[alamat]' WHERE `id_penerbit` =  '$_SESSION[id]'";
        $query_editpenerbit = mysqli_query($koneksi,$sql_editpenerbit);
        header("Location: penerbit-edit=berhasil");
    }

}

?>