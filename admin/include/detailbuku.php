<?php
    $query =mysqli_query($koneksi,"SELECT `kategori_buku`,`id_buku`,`penerbit`,`judul`,`cover`,`tahun_terbit`,`sinopsis`,`pengarang` FROM `buku`
                                     INNER JOIN kategori_buku USING(id_kategori_buku) 
                                     INNER JOIN penerbit USING(id_penerbit)
                                     where id_buku = '$_GET[idkb]'");
    while($data = mysqli_fetch_assoc($query)){
      $cover = $data["cover"];
      $sinopsis = $data["sinopsis"];
      $tahun = $data["tahun_terbit"];
      $pengarang =$data["pengarang"];
      $judul = $data["judul"] ;
      $kategoribuku = $data["kategori_buku"];
      $penerbit = $data["penerbit"];



    }

?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Buku</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="buku">Data Buku</a></li>
              <li class="breadcrumb-item active">Detail Data Buku</li>
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
                  <a href="buku" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>                      
                      <tr>
                        <td><strong>Cover Buku<strong></td>
                        <td><img src="cover/<?=$cover?>" class="img-fluid" width="200px;" ></td>
                      </tr>               
                      <tr>
                        <td width="20%"><strong>Kategori Buku<strong></td>
                        <td width="80%"><?=$kategoribuku?></td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Judul<strong></td>
                        <td width="80%"><?=$judul?></td>
                      </tr>                 
                      <tr>
                        <td width="20%"><strong>Pengarang<strong></td>
                        <td width="80%"><?=$pengarang?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Tahun Terbit<strong></td>
                        <td width="80%"><?=$tahun?></td>
                      </tr>
                      <tr>
                        <td><strong>Tag<strong></td>
                        <td>
                          <ul>
                            <?php 
                            $query_tagbook = mysqli_query($koneksi, "SELECT *FROM tag_buku INNER JOIN tag USING (id_tag)WHERE id_buku = '$_GET[idkb]'");
                           while ($data_tagbook = mysqli_fetch_assoc($query_tagbook)){
                            $tag = $data_tagbook["tag"];
                           ?>
                            <li><?=$tag?></li>
                        <?php } ?>
                          </ul>
                        </td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Sinopsis<strong></td>
                        <td width="80%"><?=$sinopsis?></td>
                      </tr> 
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
