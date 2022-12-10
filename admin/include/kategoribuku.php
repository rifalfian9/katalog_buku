
<?php error_reporting(E_ALL ^ E_WARNING || E_NOTICE) ?>
<?php session_start() ?>




<?php 
        $data_tampil = 4;
              $query_jumlahdata = mysqli_query($koneksi,"SELECT * FROM kategori_buku" );
              $jumlahdata = mysqli_num_rows($query_jumlahdata);
             
              $halamanaktif = (isset($_GET["halaman"])) ? $halamanaktif = $_GET["halaman"] : $halamanaktif = 1;
              $awaldata = ($data_tampil * $halamanaktif) - $data_tampil ;

              $jumlahhal = ceil($jumlahdata/$data_tampil);


        $sql_k = "SELECT `id_kategori_buku` , `kategori_buku` FROM `kategori_buku` ORDER BY `id_kategori_buku` DESC LIMIT $awaldata,$data_tampil "; 
        $no = 1 ;

        if (isset($_POST["search"])){

            $katakunci =$_POST["katakunci"];
            $sql_k =  "SELECT `kategori_buku` FROM `kategori_buku` WHERE `kategori_buku` LIKE '%$katakunci%' ";
            }

        $query_k  = mysqli_query($koneksi,$sql_k);





?>


  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-address-book"></i> Kategori Buku</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Kategori Buku</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar  Kategori Buku</h3>
                <div class="card-tools">
                  <a href="index.php?include=tambahkategoribuku" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah Kategori Buku</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="POST" action=" ">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                          <input type="text" class="form-control" id="kata_kunci" name="katakunci" autofocus placeholder="Cari" autocomplete="off" >
                        </div>
                        <div class="col-md-5 bottom-10">
                          <button type="submit" class="btn btn-primary" name="search" ><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
                  </form>
                </div><br>
              <div class="col-sm-12">
                <?php if ($_GET["tambah"] == "berhasil") {?>
                  <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                <?php }?>

                <?php if ($_GET["hapus"] == "berhasil") {?>
                  <div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>
                <?php }?>

                <?php if ($_GET["edit"] == "berhasil") {?>
                  <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                <?php }?>
              </div>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th width="5%">No</th>
                      <th width="80%">Kategori Buku</th>
                      <th width="15%"><center>Aksi</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php while ($data_k = mysqli_fetch_assoc($query_k)){
                      $_SESSION['kategoribuku']  = $data_k["kategori_buku"] ;
                      $_SESSION['idkategoribuku']  = $data_k["id_kategori_buku"];
                     
                      ?>
                      <tr>
                      <td><?= $no ?></td>
                      <td><?= $_SESSION["kategoribuku"] ?></td>
                      <td align="center">
                        <a href="editkategoribuku-idkb=<?=$_SESSION["idkategoribuku"];?>" class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <a href="hapuskategoribuku-idkb=<?=$_SESSION["idkategoribuku"];?>" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Hapus</a>
                      </td>
                      </tr>
                      <?php $no++; } ?>
                      
                   
                    <?php  ?>
                    
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <?php if ($halamanaktif > 1 ) : ?>
                    <li class="page-item"><a class="page-link" href="kategori-buku-halaman=<?=$halamanaktif-1?>">&laquo;</a></li>
                  <?php endif ;?>
                    <?php for ($num=1 ; $num <= $jumlahhal; $num++) { ?>
                        <li class="page-item"><a class="page-link" href="kategori-buku-halaman=<?=$num?>"><?=$num?></a></li>
                  <?php } ?>
                 <?php if ( $num > $halamanaktif ) : ?>
                    <li class="page-item"><a class="page-link" href="kategori-buku-halaman=<?=$halamanaktif+1?>">&raquo;</a></li>
                  <?php endif ;?>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
