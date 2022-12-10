<?php 

$_SESSION["ideditblog"] = $_GET["idkb"];
$query_editblog = mysqli_query($koneksi, "SELECT *FROM blog INNER JOIN `kategori_blog` USING (`id_kategori_blog`) where `id_blog` = '$_GET[idkb]' ");
while ($data_eb = mysqli_fetch_assoc($query_editblog)) {
  $_SESSION["idkate"]=  $data_eb["id_kategori_blog"];
  $_SESSION["ktblog"]= $data_eb["kategori_blog"];
  $_SESSION["judul"] = $data_eb["judul"];
  $_SESSION["isi"] = $data_eb["isi"];
}


?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Blog</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="blog">Data Blog</a></li>
              <li class="breadcrumb-item active">Edit Data Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Blog</h3>
        <div class="card-tools">
          <a href="blog" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br></br>
      <div class="col-sm-10">
        <?php if(isset($_GET["edit"]) && $_GET["edit"] =="gagal" ) : ?>
          <div class="alert alert-danger" role="alert">Maaf judul wajib di isi</div>
        <?php endif ;?>
      </div>
      <form class="form-horizontal" method="post"  action="konfirmasieditblog">
        <div class="card-body">
          
        <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori Blog</label>
            <div class="col-sm-7">
              <select class="form-control" id="kategori" name="opsi">
                <option value="<?=$_SESSION["idkate"]?>" > <?=$_SESSION["ktblog"]?> </option>
                <?php
                  $kuerinya = mysqli_query($koneksi, "SELECT *FROM kategori_blog");
                  while ($datakueri = mysqli_fetch_assoc($kuerinya)) {
                    $kategori = $datakueri["kategori_blog"];
                    $idkategori =$datakueri["id_kategori_blog"];
               
                   echo "<option value=$idkategori> $kategori </option>";  
               }?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="nim" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="judul" id="nim" value="<?=$_SESSION["judul"]?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="isi" class="col-sm-3 col-form-label">Isi</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="isi" id="editor1" rows="12" > <?=$_SESSION["judul"]?></textarea>
            </div>
          </div>

          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" name="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
