
<?php 
  error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
  $_SESSION["id"] = $_GET["idkb"];
  $sql_editpenerbit = "SELECT * FROM `penerbit` WHERE  `id_penerbit` = '$_GET[idkb]' " ;
  $query_editpenerbit = mysqli_query($koneksi, $sql_editpenerbit);
  while($data_editpenerbit = mysqli_fetch_assoc($query_editpenerbit)){
    $_SESSION["penerbit"] = $data_editpenerbit["penerbit"];
    $_SESSION["alamat"] = $data_editpenerbit["alamat"];
  }
  

?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Penerbit</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="penerbit">Penerbit</a></li>
              <li class="breadcrumb-item active">Edit Penerbit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Penerbit</h3>
        <div class="card-tools">
          <a href="penerbit" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <div class="col-sm-10">
        <?php if (isset($_GET["edit"]) && $_GET["edit"] == "gagal") :?>
          <div class="alert alert-danger" role="alert">Maaf data Penerbit wajib di isi</div>
        <?php endif; ?>
      </div>
      <form class="form-horizontal" action="konfirmasieditpenerbit" method="post">
        <div class="card-body">
          <div class="form-group row">
            <label for="Penerbit" class="col-sm-3 col-form-label">Penerbit</label>
            <div class="col-sm-7">
              <input type="text" name="namapenerbit" class="form-control" id="Penerbit" value="<?= $_SESSION["penerbit"]?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="isi" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="alamat" id="editor1" rows="12"><?= $_SESSION["alamat"];?></textarea>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-10">
            <button type="submit" name="simpan" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
   