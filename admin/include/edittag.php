<?php 
    error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
    $query_edittag = mysqli_query($koneksi, "SELECT *FROM `tag`  where `id_tag` = '$_GET[idkb]' ");
    while ($data_tag=mysqli_fetch_assoc($query_edittag)) {
          $_SESSION["datatag"] = $data_tag["tag"];
    }

$_SESSION["id"] =$_GET["idkb"];
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Tag</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="tag">Tag</a></li>
              <li class="breadcrumb-item active">Edit Tag</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Tag</h3>
        <div class="card-tools">
          <a href="tag" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <div class="col-sm-10">
         <?php if (isset($_GET["edit"]) && $_GET["edit"] == "gagal") : ?>
          <div class="alert alert-danger" role="alert">Maaf data Tag wajib di isi</div>
          <?php endif;?>
      </div>
      <form class="form-horizontal" action="konfirmasiedittag" method="post">
        <div class="card-body">
          <div class="form-group row">
            <label for="Tag" class="col-sm-3 col-form-label">Tag</label>
            <div class="col-sm-7">
              <input type="text"  name="tag" class="form-control" id="Tag" value="<?=$_SESSION["datatag"]?>">
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
 
