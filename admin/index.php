<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("includes/head.php");
    session_start();
    include("../koneksi/koneksi.php"); 
    $include = $_GET["include"];
        if  (isset($_GET["include"])) 
    {
        if($include=="konfirmasi-login"){
          include("include/konfirmasilogin.php");
        }else if($include=="signout"){
          include("include/signout.php");
        }
        else if($include=="konfirmasitambahkategoribuku"){
          include("include/konfirmasitambahkategoribuku.php");
        }
        else if($include=="konfirmasieditprofile"){
          include("include/konfirmasieditprofile.php");
        }
        elseif ($include == "hapuskategoribuku") {
          include("include/hapuskategoribuku.php");
        }
        elseif ($include == "konfirmasieditkategoribuku") {
          include("include/konfirmasieditkategoribuku.php");
        }
        elseif ($include == "konfirmasitambahuser") {
          include("include/konfirmasitambahuser.php");
        }
      elseif ($include == "konfirmasiedituser") {
          include("include/konfirmasiedituser.php");
        }
        elseif ($include == "hapususer") {
          include("include/hapususer.php");
        }
        elseif ($include == "konfirmasitambahpenerbit") {
          include("include/konfirmasitambahpenerbit.php");
        }
        elseif ($include == "hapuspenerbit") {
          include("include/hapuspenerbit.php");
        }
      elseif ($include == "konfirmasieditpenerbit") {
          include("include/konfirmasieditpenerbit.php");
        }
          elseif ($include == "konfirmasitambahtag") {
          include("include/konfirmasitambahtag.php");
        }
        elseif ($include == "konfirmasiedittag") {
          include("include/konfirmasiedittag.php");
        }
        elseif ($include == "hapustag") {
          include("include/hapustag.php");
        }
        elseif ($include == "konfirmasitambahkategoriblog") {
          include("include/konfirmasitambahkategoriblog.php");
        }
        elseif ($include == "hapuskategoriblog") {
          include("include/hapuskategoriblog.php");
        }
          elseif ($include == "konfirmasieditkategoriblog") {
          include("include/konfirmasieditkategoriblog.php");
        }
        elseif ($include == "konfirmasieditkonten") {
          include("include/konfirmasieditkonten.php");
        }
        elseif ($include == "konfirmasitambahblog") {
          include("include/konfirmasitambahblog.php");
        }
        elseif ($include == "konfirmasitambahbuku") {
          include("include/konfirmasitambahbuku.php");
        }
          elseif ($include == "hapusbuku") {
          include("include/hapusbuku.php");
        }
        elseif ($include == "konfirmasieditbuku") {
          include("include/konfirmasieditbuku.php");
        }
          elseif ($include == "hapusblog") {
          include("include/hapusblog.php");
        }
          elseif ($include == "konfirmasieditblog") {
          include("include/konfirmasieditblog.php");
        }
        elseif ($include == "konfirmasiubahpassword") {
          include("include/konfirmasiubahpassword.php");
        }
       ?>
</head>

<body>
<?php // cek session id pada saat login
      if (isset($_SESSION["id_user"])){ ?>
        <div class="wrapper">
            <?php include("includes/header.php"); 
                  include("includes/sidebar.php") ?>
                <div class="content-wrapper">
                  <?php
                          if($include=="kategori-buku"){
                            include("include/kategoribuku.php");
                          }
                          else if($include=="tambahkategoribuku"){
                            include("include/tambahkategoribuku.php");
                          }
                          else if($include=="editprofil"){
                            include("include/editprofil.php");
                          }
                          else if($include=="editkategoribuku"){
                            include("include/editkategoribuku.php");
                          }
                          else if($include=="user"){
                            include("include/user.php");
                          }
                          else if($include=="tambahuser"){
                            include("include/tambahuser.php");
                          }
                          else if($include=="detailuser"){
                            include("include/detailuser.php");
                          }
                          else if($include=="edituser"){
                            include("include/edituser.php");
                          }
                          else if($include=="penerbit"){
                            include("include/penerbit.php");
                          }
                          else if($include=="tag"){
                            include("include/tag.php");
                          }
                          else if($include=="tambahtag"){
                            include("include/tambahtag.php");
                          }
                          else if($include=="editpenerbit"){
                            include("include/editpenerbit.php");
                          }
                          else if($include=="tambahpenerbit"){
                            include("include/tambahpenerbit.php");
                          }
                          else if($include=="edittag"){
                            include("include/edittag.php");
                          }
                          else if($include=="kategoriblog"){
                            include("include/kategoriblog.php");
                          }
                          else if($include=="tambahkategoriblog"){
                            include("include/tambahkategoriblog.php");
                          }
                          else if($include=="editkategoriblog"){
                            include("include/editkategoriblog.php");
                          }
                          else if($include=="konten"){
                            include("include/konten.php");
                          }
                          else if($include=="editkonten"){
                            include("include/editkonten.php");
                          }
                          else if($include=="detailkonten"){
                            include("include/detailkonten.php");
                          }
                          else if($include=="blog"){
                            include("include/blog.php");
                          }
                          elseif ($include == "tambahblog") {
                            include("include/tambahblog.php");
                          }
                          else if($include=="buku"){
                            include("include/buku.php");
                          }
                          else if($include=="tambahbuku"){
                            include("include/tambahbuku.php");
                          }
                          else if($include=="detailbuku"){
                            include("include/detailbuku.php");
                          }
                          else if($include=="editbuku"){
                            include("include/editbuku.php");
                          }
                          else if($include=="detailblog"){
                            include("include/detailblog.php");
                          }
                          else if($include=="editblog"){
                            include("include/editblog.php");
                          }
                          else if($include=="ubahpassword"){
                            include("include/ubahpassword.php");
                          } 
                          else{
                            include("include/profil.php");
                          }  ?> 
                    </div> <!-- Content Wrapper -->
                         <?php  include("includes/footer.php"); ?>
                 </div>   <!-- Wrapper -->
                      <?php  include("includes/script.php") ?>
  </body>
<?php } else{
        include("include/login.php");
      } ?>


<?php } //end if pertama 
 else {
      if(isset($_SESSION["id_user"])){
        //
      }
      else {
        include("include/login.php");
      }
  

 }?>




  

</html>