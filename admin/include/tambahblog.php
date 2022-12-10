
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Blog</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="blog">Data Blog</a></li>
              <li class="breadcrumb-item active">Tambah Blog</li>
            </ol>
          </div>
        </div>
      </div>
 </section>


    
  <section class="content">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Blog</h3>
        <div class="card-tools">
          <a href="blog" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br></br>
      <div class="col-sm-10">
        <?php if(isset($_GET["tambah"]) && $_GET["tambah"] == "gagal") : ?>
                <div class="alert alert-danger" role="alert">Maaf judul wajib di isi</div>
        <?php endif ; ?>
      </div>
      <form class="form-horizontal" method="post" action="konfirmasitambahblog">
        <div class="card-body">
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori Blog</label>

            <div class="col-sm-7">
              <select class="form-control" id="kategori" name="pilih">
                <option value="0">- Pilih Kategori -</option>
                <?php $query= mysqli_query($koneksi, "SELECT *FROM kategori_blog") ;
                while ($data_opsi = mysqli_fetch_assoc($query)) {
                  $valuee_kb = $data_opsi["kategori_blog"];
                  $valuee_idkb = $data_opsi["id_kategori_blog"];?>
      
              <option value=<?=$valuee_idkb?>> <?= $valuee_kb ?></option>
               <?php } ?>
              </select>
            </div>
          </div>

           <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Penulis</label>

            <div class="col-sm-7">
              <select class="form-control" id="penulis" name="penulis">
                <option value="0">- Pilih Penulis -</option>
                <?php $query_op= mysqli_query($koneksi, "SELECT *FROM user") ;
                while ($dt_opsi = mysqli_fetch_assoc($query_op)) {
                  $valuee_usr = $dt_opsi["nama"];
                  $valuee_idusr = $dt_opsi["id_user"]; ?>
              <option value= <?=$valuee_idusr?>> <?=$valuee_usr?> </option>
              <?php } 
              ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="nim" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="judul" id="nim" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal </label>
            <div class="col-sm-7">
              <div class="input-group date">
                <input type="date" class="form-control" name="tanggal" id="datepicker"  autocomplete="off">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                  </div>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="isi" class="col-sm-3 col-form-label">Isi</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="isi" id="editor1" rows="12"></textarea>
            </div>
          </div>

          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right" name="submit"><i class="fas fa-plus"></i> Tambah</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
