<!DOCTYPE html>
<html>
<head>
<?php include("includes/head.php") ;
include("../koneksi/koneksi.php"); ?> 
<?php
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
 session_start();
  $_SESSION["idkb"] = $_GET["idkb"];

  $sql_value = "SELECT `kategori_buku` FROM `kategori_buku` WHERE `id_kategori_buku` = '$_GET[idkb]' ";
  $query_value = mysqli_query($koneksi, $sql_value);
  while ($data_value = mysqli_fetch_assoc($query_value)){
    $_SESSION["kategori_value"] = $data_value["kategori_buku"];
    // $idkategori = $data_value["kategori_buku"];
  }
  


?>


  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Kategori Buku</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="kategori-buku">Kategori Buku</a></li>
              <li class="breadcrumb-item active">Edit Kategori Buku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Kategori Buku</h3>
        <div class="card-tools">
          <a href="kategori-buku" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>

            <?php if (isset($_GET["nama"]) && $_GET["nama"] == "kosong") { ?>
              <div class="col-sm-10">
                  <div class="alert alert-danger" role="alert">Maaf data Kategori Buku wajib di isi</div>
              </div>
            <?php } ?>
            
      <form class="form-horizontal" method="post" action="konfirmasieditkategoribuku">
        <input type= hidden name="id" value="<?= $id ?>">
        <div class="card-body">
          <div class="form-group row">
            <label for="Kategori Buku" class="col-sm-3 col-form-label">Kategori Buku</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="Kategori Buku"  name="update" value="<?php echo $_SESSION["kategori_value"] ?>">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-info float-right" name="confirm"><i class="fas fa-save"  ></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->



