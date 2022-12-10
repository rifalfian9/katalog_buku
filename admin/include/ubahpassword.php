
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-lock"></i> Ubah Password</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Ubah Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Pengaturan Password</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form class="form-horizontal" action="konfirmasiubahpassword" method="post">
        <div class="card-body">
          <h6>
            <i class="text-blue"><i class="fas fa-info-circle"></i> Silahkan memasukkan password lama dan password baru Anda untuk mengubah password.</i>
          </h6><br>
           <?php if (isset($_GET["ganti"]) && $_GET["ganti"] == "sukses"){?>
                <div class="col-sm-12">
                    <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                </div>
                <?php }?>
          
          <div class="form-group row">
            <label for="pass_lama" class="col-sm-3 col-form-label">Password Lama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="pass_lama" name="passlama" value="">

            </div>
          </div>
          <div class="form-group row">
            <label for="pass_baru" class="col-sm-3 col-form-label">Password Baru</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="pass_baru" name="passbaru" value="">
              <!--<span class="text-danger">Mohon maaf, password baru wajib diisi.</span>-->
            </div>
          </div>
          <div class="form-group row">
            <label for="konfirmasi" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="konfirmasi" name="konpassbaru" value="">
               <?php if (isset($_GET["gagal"])  && $_GET["gagal"] == "tidaksama") :?>
                     <span class="text-danger">Mohon maaf, password lama tidak sesuai. </span>
              <?php endif ;?>
              <?php if (isset($_GET["gagal"])  && $_GET["gagal"] == "kosong") :?>
                     <span class="text-danger">Mohon maaf, password lama wajib diisi. </span>
              <?php endif ;?>
              <?php if (isset($_GET["gagal"]) && $_GET["gagal"] == "konpasskosong") :?>
                      <span class="text-danger">Mohon maaf, konfirmasi password baru wajib diisi.</span>
              <?php endif ;?>
              <?php if (isset($_GET["gagal"]) && $_GET["gagal"] == "konpasserror") :?>
                      <span class="text-danger">Mohon maaf, konfirmasi password baru tidak sesuai</span>
              <?php endif ;?>
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
   