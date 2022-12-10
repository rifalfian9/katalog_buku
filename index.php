<!Doctype html>
 <?php include("koneksi/koneksi.php"); ?>
<html lang="en">
    <head>
        <?php include("includes/head.php"); ?>
    </head>
    <body>
<?php include("includes/navigasi.php");

if (isset($_GET["include"]) ){
$include = $_GET["include"];
    if ($include == "aboutus"){
        include("include/aboutus.php");
    }
    else if ($include == "detailbuku") {
        include("include/detailbuku.php");
    }
    else if($include == "index") {
        include("include/index.php");
    }
    else if ($include == "contactus") {
        include("include/contactus.php");
    }
     else if ($include == "detailblog") {
        include("include/detailblog.php");
    }
    else if ($include == "daftarbuku") {
        include("include/daftarbuku.php");
    }
     else if ($include == "blog") {
        include("include/blog.php");
    }
    else {
        include("include/index.php");
    }

}
else {
    include("include/index.php");
}




include("includes/footer.php"); 
include("includes/script.php");
?>
</body>

</html>
