<?php 

$sql_detailuser = "SELECT `nama`, `email`, `username`, `levels`, `foto` FROM `user` WHERE `id_user` ='$_GET[idu]' ";
$query_detailuser = mysqli_query($koneksi, $sql_detailuser);
while ($data_detailuser = mysqli_fetch_assoc($query_detailuser)){
  $nama = $data_detailuser['nama'];
  $email= $data_detailuser['email'];
  $username = $data_detailuser['username'];
  $level = $data_detailuser['levels'];
  $foto =$data_detailuser['foto'];
}




?>




    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="user">Data User</a></li>
              <li class="breadcrumb-item active">Detail Data User</li>
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
                  <a href="user" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-circle"></i> <strong>Data User<strong></td>
                      </tr>                      
                      <tr>
                        <td><strong>Foto User<strong></td>
                        <td><img src="foto/<?= $foto ?>" class="img-fluid" width="200px;"></td>
                      </tr>               
                      <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%"><?= $nama ?></td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Email<strong></td>
                        <td width="80%"><?= $email ?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Level<strong></td>
                        <td width="80%"><?= $level ?></td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Username<strong></td>
                        <td width="80%"><?= $username ?></td>
                      </tr> 
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
