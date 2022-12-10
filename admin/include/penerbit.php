<?php 

  $data_tampil = 5;
              $query_jumlahdata = mysqli_query($koneksi,"SELECT * FROM penerbit" );
              $jumlahdata = mysqli_num_rows($query_jumlahdata);
             
              $halamanaktif = (isset($_GET["halaman"])) ? $halamanaktif = $_GET["halaman"] : $halamanaktif = 1;
              $awaldata = ($data_tampil * $halamanaktif) - $data_tampil ;

              $jumlahhal = ceil($jumlahdata/$data_tampil);




  $sql_penerbit = "SELECT *FROM `penerbit` LIMIT $awaldata,$data_tampil " ;

   if (isset($_POST["search"])){
        $katakunci =$_POST["katakunci"];
        $sql_penerbit =  "SELECT *FROM `penerbit` WHERE `penerbit` LIKE '%$katakunci%' ";
            }

  $query_penerbit = mysqli_query($koneksi, $sql_penerbit);
?>


    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-book-reader"></i> Penerbit</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Penerbit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Penerbit</h3>
                <div class="card-tools">
                  <a href="tambahpenerbit" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah Penerbit</a>
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
                    </div>
                  </form>
                </div><br>
              <div class="col-sm-12">
                <?php if(isset($_GET["tambah"]) && $_GET["tambah"] == "berhasil") : ?>
                  <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                <?php endif; ?>
                <?php if(isset($_GET["hapus"]) && $_GET["hapus"] == "berhasil") : ?>
                  <div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>
                <?php endif; ?>
                 <?php if(isset($_GET["edit"]) && $_GET["edit"] == "berhasil") : ?>
                  <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                <?php endif; ?>
                  
              </div>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th width="5%">No</th>
                      <th width="30%">Penerbit</th>
                      <th width="50%">Alamat</th>
                      <th width="15%"><center>Aksi</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php $no = 1 ;
                        while( $data_penerbit = mysqli_fetch_assoc($query_penerbit)) : ?>
                      
                      <td><?= $no ?></td>
                      <td><?= $data_penerbit["penerbit"]?></td>
                      <td><?= $data_penerbit["alamat"]?></td>
                      <td align="center">
                        <a href="editpenerbit-idkb=<?= $data_penerbit["id_penerbit"]?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="hapuspenerbit-idkb=<?= $data_penerbit["id_penerbit"]?>" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Hapus</a>
                      </td>
                    </tr>
                    <?php $no++ ;
                    
                    endwhile ; ?>
                    
                  </tbody>
                </table>
              </div>
              
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                 <?php if ($halamanaktif > 1 ) : ?>
                    <li class="page-item"><a class="page-link" href="penerbit-halaman=<?=$halamanaktif-1?>">&laquo;</a></li>
                  <?php endif ;?>
                    <?php for ($num=1 ; $num <= $jumlahhal; $num++) { ?>
                        <li class="page-item"><a class="page-link" href="penerbit-halaman=<?=$num?>"><?=$num?></a></li>
                  <?php } ?>
                 <?php if ( $num > $halamanaktif ) : ?>
                    <li class="page-item"><a class="page-link" href="penerbit-halaman=<?=$halamanaktif+1?>">&raquo;</a></li>
                  <?php endif ;?>
                </ul>
              </div>
            </div>
          

    </section>
    

