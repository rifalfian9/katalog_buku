<?php
$_SESSION["id"] = $_GET["idkb"];
  $query_konten = mysqli_query($koneksi, "SELECT *FROM `konten` where `id_konten` = '$_GET[idkb]' ");
  while ($data_konten = mysqli_fetch_assoc($query_konten) ) {
    $_SESSION["judul"] = $data_konten["judul"] ;
    $_SESSION["isi"] = $data_konten["isi"] ;
  }

?>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Konten</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="konten">Data Konten</a></li>
              <li class="breadcrumb-item active">Edit Data Konten</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Konten</h3>
        <div class="card-tools">
          <a href="konten" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br></br>
      <div class="col-sm-10">
        <?php if (isset($_GET["edit"]) && $_GET["edit"] == "gagal") : ?>
          <div class="alert alert-danger" role="alert">Maaf judul wajib di isi</div>
        <?php endif ; ?>
      </div>
      <form class="form-horizontal" action="konfirmasieditkonten" method="post">
        <div class="card-body">
          
          <div class="form-group row">
            <label for="nim" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="judul" id="nim" value="<?=$_SESSION["judul"]?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="sinopsis" class="col-sm-3 col-form-label">Isi</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="sinopsis" id="editor1" rows="12"><?=$_SESSION["isi"]?></textarea>
            </div>
          </div>     

          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" name="simpan" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
 