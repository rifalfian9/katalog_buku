
<?php 
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
    $_SESSION["id_kategori_blog"] =  $_GET["idkb"]; 
    $_query = mysqli_query($koneksi, "SELECT *FROM `kategori_blog` WHERE `id_kategori_blog` = '$_GET[idkb]' ");
    while ($data_editkategoriblog= mysqli_fetch_assoc($_query)){
      $_SESSION["kategoriblog"] = $data_editkategoriblog["kategori_blog"];
      
    }
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Kategori Blog</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="kategoriblog">Kategori Blog</a></li>
              <li class="breadcrumb-item active">Edit Kategori Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Kategori Blog</h3>
        <div class="card-tools">
          <a href="kategoriblog" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <div class="col-sm-10">
        <?php if(isset($_GET["edit"]) && $_GET["edit"] == "gagal") :?>
          <div class="alert alert-danger" role="alert">Maaf data Kategori Blog wajib di isi</div>
        <?php endif;?>
      </div>
      <form class="form-horizontal" method="post" action="index.php?include=konfirmasieditkategoriblog">
        <div class="card-body">
          <div class="form-group row">
            <label for="Kategori Blog" class="col-sm-3 col-form-label">Kategori Blog</label>
            <div class="col-sm-7">
              <input type="text" name="kategoriblog" class="form-control" id="Kategori Blog" value="<?=$_SESSION["kategoriblog"]?>">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-10">
            <button type="submit"  name="simpan" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
