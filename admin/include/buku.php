<?php error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
    $data_tampil = 5;
              $query_jumlahdata = mysqli_query($koneksi,"SELECT * FROM buku" );
              $jumlahdata = mysqli_num_rows($query_jumlahdata);
             
              $halamanaktif = (isset($_GET["halaman"])) ? $halamanaktif = $_GET["halaman"] : $halamanaktif = 1;
              $awaldata = ($data_tampil * $halamanaktif) - $data_tampil ;

              $jumlahhal = ceil($jumlahdata/$data_tampil);


            $sql_buku = "SELECT `kategori_buku` , `id_buku` ,`penerbit`, `judul` FROM  `buku` 
            INNER JOIN kategori_buku USING(id_kategori_buku) 
            INNER JOIN penerbit USING(id_penerbit) LIMIT $awaldata,$data_tampil";

               if (isset($_POST["search"])){
                $katakunci = $_POST["katakunci"];
                $sql_buku=  "SELECT `kategori_buku` , `id_buku` ,`penerbit`, `judul` FROM  `buku` 
                              INNER JOIN kategori_buku USING(id_kategori_buku) 
                              INNER JOIN penerbit USING(id_penerbit) where 
                              `kategori_buku` LIKE '%$katakunci%' OR 
                              `penerbit` LIKE '%$katakunci%' OR 
                              `judul` LIKE '%$katakunci%' ";
                }
       $query_buku = mysqli_query($koneksi, $sql_buku);
?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-book"></i> Buku</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Buku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Buku</h3>
                <div class="card-tools">
                  <a href="tambahbuku" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah Buku</a>
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
                <?php if (isset($_GET["tambah"]) && $_GET["tambah"] == "berhasil") :?>
                    <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                <?php endif; ?>
                <?php if (isset($_GET["edit"]) && $_GET["edit"] == "berhasil") :?>
                    <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                <?php endif; ?>
                <?php if (isset($_GET["hapus"]) && $_GET["hapus"] == "berhasil") :?>
                    <div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>
                <?php endif; ?>
              </div>
                  <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="30%">Kategori</th>
                        <th width="30%">Judul</th>
                        <th width="20%">Penerbit</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php $no = 1 ;
                          while ($data_buku = mysqli_fetch_assoc($query_buku) ) {
                                $judul = $data_buku["judul"];
                                $kategori_buku = $data_buku["kategori_buku"];
                                $penerbit = $data_buku["penerbit"];
                                $id =  $data_buku["id_buku"];
                            ?>
                              <td><?=$no?></td>
                              <td><?=$kategori_buku?></td>
                              <td><?=$judul?></td>
                              <td><?=$penerbit?></td>
                              <td align="center">
                                <a href="editbuku-idkb=<?=$id?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="detailbuku-idkb=<?=$id?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                                <a href="hapusbuku-idkb=<?=$id?>" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></a>                         
                              </td>
                        </tr>
                             <?php $no++ ; ?>
                          <?php } ?>
                     
                      
                      
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