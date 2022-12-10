<?php
$query_blog = mysqli_query($koneksi, "SELECT *FROM `blog` INNER JOIN `kategori_blog` USING (`id_kategori_blog`) 
                                      INNER JOIN `user` USING (`id_user`) 
                                      where id_blog = '$_GET[idkb]' ");
while ($data_detailblog = mysqli_fetch_assoc($query_blog) ) {
  $tanggal = $data_detailblog["tanggal"];
  $kategori_blog = $data_detailblog["kategori_blog"] ;
  $isi = $data_detailblog["isi"];
  $judul = $data_detailblog["judul"];
  $penulis = $data_detailblog["nama"];
}

?>

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Blog</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="blog">Data Blog</a></li>
              <li class="breadcrumb-item active">Detail Data Blog</li>
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
                  <a href="blog" class="btn btn-sm btn-warning float-right">
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
                        <td width="20%"><strong>Kategori Blog<strong></td>
                        <td width="80%"><?=$kategori_blog?></td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Judul<strong></td>
                        <td width="80%"><?=$judul?></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Penulis<strong></td>
                        <td width="80%"><?=$penulis?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Isi<strong></td>
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
    <!-- /.content -->
