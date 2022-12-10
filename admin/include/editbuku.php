<?php
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
  $_SESSION["id_editbuku"] =$_GET["idkb"] ;
    $sqleditbuku = "SELECT *FROM  `buku` 
                  INNER JOIN `kategori_buku` USING (`id_kategori_buku`) 
                  INNER JOIN `penerbit` USING (`id_penerbit`) 
                  where id_buku = '$_SESSION[id_editbuku]'";
    $queryeditbuku = mysqli_query($koneksi, $sqleditbuku);
    while ($dataedit = mysqli_fetch_assoc($queryeditbuku)){
      $_SESSION["idkategoribuku"] = $dataedit["id_kategori_buku"];
      $_SESSION["kategoribuku"] = $dataedit["kategori_buku"];
      $_SESSION["penerbit"] = $dataedit["penerbit"];
      $_SESSION["idpenerbit"] = $dataedit["id_penerbit"];
      $_SESSION["cover"]= $dataedit["cover"];
      $_SESSION["judul"] = $dataedit["judul"];
      $_SESSION["sinopsis"] = $dataedit["sinopsis"];
      $_SESSION["tahun"] = $dataedit["tahun_terbit"];
      $_SESSION["pengarang"] = $dataedit["pengarang"];

    }

    $query_tag =  mysqli_query($koneksi,"SELECT *FROM tag_buku INNER JOIN tag USING (id_tag) WHERE id_buku =  '$_SESSION[id_editbuku]' ");
    while ($data_tag = mysqli_fetch_assoc($query_tag) ) {
      $arraytag[] = $data_tag["id_tag"];
    }

?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data Buku</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="buku">Data Buku</a></li>
              <li class="breadcrumb-item active">Edit Data Buku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Buku</h3>
        <div class="card-tools">
          <a href="buku" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br></br>
      <div class="col-sm-10">
        <?php if (isset($_GET["edit"]) && $_GET["edit"] == "gagal") : ?>
          <div class="alert alert-danger" role="alert">Maaf judul wajib di isi</div>
        <?php endif ;?>
      </div>
      <form class="form-horizontal" enctype="multipart/form-data" method="post" action="konfirmasieditbuku">
        <div class="card-body">
          
        <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Cover Buku </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="cover" id="customFile" value="<?php echo $_SESSION["cover"]?>" ><br>
                <input type="hidden" class="custom-file-input" name="coverlama" id="customFile" value="<?php echo $_SESSION["cover"]?>"><br>
                <label class="custom-file-label" for="customFile">Choose file</label><br>
                <img src="cover/<?=$_SESSION["cover"]?>" width="100px;" height="100px" style="border-radius: 50px;" >
              </div>  
              <br>
            </div>
          </div>
          <br><br>
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori Buku</label>
            <div class="col-sm-7">
              <select class="form-control" id="kategori" name="opsikb" >
                  <?php 
                        $query_editlo = mysqli_query($koneksi, "SELECT *FROM kategori_buku");
                        while ($datas = mysqli_fetch_assoc($query_editlo)){
                          $paluesid = $datas["id_kategori_buku"];
                          $palues = $datas["kategori_buku"]; ?>
                    <option value=<?=$paluesid?> <?php if ($paluesid == $_SESSION["idkategoribuku"]) { ?> selected <?php } ?>> <?=$palues?> </option>
                  <?php }?>
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
            <label for="pengarang" class="col-sm-3 col-form-label">Pengarang</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="pengarang" id="pengarang" value=" <?=$_SESSION["pengarang"]?> ">
            </div>
          </div>
       
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Penerbit</label>
            <div class="col-sm-7">
              <select class="form-control" id="kategori" name="opsipb">
                <?php 
                    $query_p = mysqli_query($koneksi, "SELECT *FROM penerbit");
                    while ($data_p = mysqli_fetch_assoc($query_p)) {
                      $values_p = $data_p["penerbit"];
                       $values_pid = $data_p["id_penerbit"]; ?>
               
                      <option value=<?=$values_pid?> <?php if($values_pid ==  $_SESSION["idpenerbit"]) { ?> selected 
                        <?php }?>> <?=$values_p ?> </option>
              <?php }?>
              </select>
            </div>
          </div>
            
          <div class="form-group row">
            <label for="tanggal" class="col-sm-3 col-form-label">Tahun Terbit</label>
            <div class="col-sm-7">
              <div class="input-group date">
                <input type="text" class="form-control" name="tanggal" id="datepicker-year"  autocomplete="off"
                value="<?=$_SESSION["tahun"];?>">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                  </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="sinopsis" class="col-sm-3 col-form-label">Sinopsis</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="sinopsis" id="editor1" rows="12"><?=$_SESSION["sinopsis"]?></textarea>
            </div>
          </div>          
          <div class="form-group row">
            <label for="hobi" class="col-sm-3 col-form-label">Tag</label>
            <div class="col-sm-7">
              <?php $query_tag = mysqli_query($koneksi, "select *from tag") ;
              while ($data_tag = mysqli_fetch_assoc($query_tag) ){ 
                $dt_tag =  $data_tag["id_tag"];
                ?>

              <input type="checkbox" name="tag[]" value=<?=$dt_tag?> <?php if (in_array($dt_tag, $arraytag)) {?> checked <?php } ?>>
              <?php echo $data_tag["tag"] ?> </br>
              <?php } ?>
            </div>
          </div>

          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right" name="simpan" ><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
