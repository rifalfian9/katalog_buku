<?php
  $query_konten = mysqli_query($koneksi, "SELECT *FROM `konten` where `id_konten` = '$_GET[idkb]' ");
 while ($data_konten= mysqli_fetch_assoc($query_konten)) {
  $tanggal = $data_konten["tanggal"];
  $isi = $data_konten["isi"];
  $judul= $data_konten["judul"];
 }
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Konten</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="konten">Data Konten</a></li>
              <li class="breadcrumb-item active">Detail Data Konten</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="konten" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>                
                      <tr>
                        <td width="20%"><strong>Tanggal<strong></td>
                        <td width="80%"><?=$tanggal?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Judul<strong></td>
                        <td width="80%"><?=$judul?></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Sinopsis<strong></td>
                        <td width="80%"><?=$isi?></td>
                      </tr> 
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
  