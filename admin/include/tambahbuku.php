    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-plus"></i> Tambah Buku</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="buku">Data Buku</a></li>
              <li class="breadcrumb-item active">Tambah Buku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Buku</h3>
        <div class="card-tools">
          <a href="buku" class="btn btn-sm btn-warning float-right">
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
      <form class="form-horizontal" method="post" action="konfirmasitambahbuku" enctype="multipart/form-data">
        <div class="card-body">
          
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Cover Buku </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="cover" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori Buku</label>
            <div class="col-sm-7">
              <select class="form-control" id="kategori" name="pilihkb">
                <option value="">- Pilih Kategori -</option>
                <?php 
                    $query = mysqli_query($koneksi, "SELECT *FROM kategori_buku");
                    while ($data = mysqli_fetch_assoc($query)) {
                      $valuesid = $data["id_kategori_buku"];
                      $values = $data["kategori_buku"];
                ?>
                <option value="<?=$valuesid?>"><?=$values?></option>
                <?php }?>
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
            <label for="pengarang" class="col-sm-3 col-form-label">Pengarang</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="pengarang" id="pengarang" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Penerbit</label>
            <div class="col-sm-7">
              <select class="form-control" id="kategori" name="penerbit">
                <option value="0">- Pilih penerbit -</option>
                <?php 
                    $query_p = mysqli_query($koneksi, "SELECT *FROM penerbit");
                    while ($data_p = mysqli_fetch_assoc($query_p)) {
                      $values_p = $data_p["penerbit"];
                       $values_pid = $data_p["id_penerbit"];
                ?>
                <option value="<?=$values_pid?>"> <?=$values_p?> </option>
                <?php }?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="tanggal" class="col-sm-3 col-form-label">Tahun Terbit</label>
            <div class="col-sm-7">
              <div class="input-group date">
                <input type="text" class="form-control" name="tanggal" id="datepicker-year"  autocomplete="off"
                value="">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                  </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="sinopsis" class="col-sm-3 col-form-label">Sinopsis</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="sinopsis" id="editor1" rows="12"></textarea>
            </div>
          </div>          
          <div class="form-group row">
            <label for="hobi" class="col-sm-3 col-form-label">Tag</label>
            <div class="col-sm-7">
              <?php 
                    $query_t = mysqli_query($koneksi, "SELECT *FROM tag");
                    while ($data_t = mysqli_fetch_assoc($query_t)) {
                      $values_t = $data_t["tag"];
                      $values_tid = $data_t["id_tag"];
                ?>
              <input type="checkbox" name="pilihtag[]" value="<?=$values_tid?>"> <?=$values_t?> </br>
              <?php } ?>
            </div>
          </div>

          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right" name="tambah"><i class="fas fa-plus"></i> Tambah</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>

