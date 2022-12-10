<?php error_reporting(E_ALL ^ E_WARNING || E_NOTICE);?>
<?php

  $data_tampil = 5;
              $query_jumlahdata = mysqli_query($koneksi,"SELECT * FROM konten" );
              $jumlahdata = mysqli_num_rows($query_jumlahdata);
             
              $halamanaktif = (isset($_GET["halaman"])) ? $halamanaktif = $_GET["halaman"] : $halamanaktif = 1;
              $awaldata = ($data_tampil * $halamanaktif) - $data_tampil ;

              $jumlahhal = ceil($jumlahdata/$data_tampil);

  $sql_konten = "SELECT *FROM `konten` LIMIT  $awaldata,$data_tampil";
   if (isset($_POST["search"])){
        $katakunci = $_POST["katakunci"];
        $sql_konten =  "SELECT *FROM `konten` WHERE `judul` LIKE '%$katakunci%' OR `tanggal` LIKE '%$katakunci%' ";
            }

  $query_konten = mysqli_query($koneksi,$sql_konten );
 

?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-file-alt"></i> Konten</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Konten</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Konten</h3>
                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci">
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary" name="search"><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br>
              <div class="col-sm-12">
                 <?php if(isset($_GET["edit"]) && $_GET["edit"] == "berhasil") : ?>
                  <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                <?php endif; ?>
              </div>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th width="5%">No</th>
                      <th width="50%">Judul</th>
                      <th width="30%">Tanggal</th>
                      <th width="15%"><center>Aksi</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php $no=1;
                       while ($data_konten = mysqli_fetch_assoc($query_konten) ) {
                          $data_konten["judul"] ;  ?>
                      <td><?=$no?></td>
                      <td><?=$data_konten["judul"] ;?></td>
                      <td><?=$data_konten["tanggal"] ;?></td>
                      <td align="center">
                        <a href="editkonten-idkb=<?=$data_konten["id_konten"] ;?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i></a>
                        <a href="detailkonten-idkb=<?=$data_konten["id_konten"] ;?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                      </td>
                    </tr>
                    <?php $no++ ; } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" <?php 
                    if($halamanaktif != 1){ $posisi = $halamanaktif-1;}
                    else{$posisi = 1;}
                    ?>href="buku-halaman=<?=$posisi?>">&laquo;</a></li>
        
                    <li class="page-item"><a class="page-link" <?php 
                    if(isset($_GET["halaman"])){ $posisi = $_GET["halaman"];}
                    else if(!isset($_GET["halaman"])) {$posisi = 1;}
                    ?>
                    href="buku-halaman=<?=$posisi?>"> <?=$posisi?> </a></li>
      
                    <li class="page-item"><a class="page-link" <?php 
                    if($halamanaktif != $jumlahhal ){ $posisi = $halamanaktif+1;}
                    else{$posisi = $halamanaktif;}
                    ?>href="buku-halaman=<?=$posisi?>">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    