<?php 
              error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
              $data_tampil = 6;
              $query_jumlahdata = mysqli_query($koneksi,"SELECT * FROM user" );
              $jumlahdata = mysqli_num_rows($query_jumlahdata);
             
              $halamanaktif = (isset($_GET["halaman"])) ? $halamanaktif = $_GET["halaman"] : $halamanaktif = 1;
              $awaldata = ($data_tampil * $halamanaktif) - $data_tampil ;

              $jumlahhal = ceil($jumlahdata/$data_tampil);
              $sql_user = "SELECT `id_user`, `nama`, `email`, `username`, `password`, `levels`, `foto` FROM `user` LIMIT  $awaldata,$data_tampil ";
              $i = 1;

            if (isset($_POST["search"])){

              $katakunci = $_POST["katakunci"];
              $sql_user=  "SELECT `id_user`, `nama`, `email`, `username`, `password`, `levels`, `foto` FROM `user` 
                            WHERE  `nama` LIKE '%$katakunci%' 
                            OR `email` LIKE '%$katakunci%' 
                            OR `levels` LIKE '%$katakunci%' ORDER BY `nama` ASC" ;
              }
    $query_user = mysqli_query($koneksi, $sql_user);

   
                        
?>


  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Data User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Data User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar User</h3>
                <div class="card-tools">
                  <a href="tambahuser" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah User</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col-md-12">
                  <form method="post" action="">
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
                <?php if($_GET["tambah"]  && $_GET["tambah"] == "berhasil") :?>
                  <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                <?php endif ;?>
                 <?php if($_GET["hapus"]  && $_GET["hapus"] == "berhasil") :?>
                  <div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>
                <?php endif ;?>
                <?php if($_GET["edit"]  && $_GET["edit"] == "berhasil") :?>
                  <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                <?php endif ;?>
              </div>
              <table class="table table-bordered">
                    <thead>                  
                      <tr>
                        <th width="5%">No</th>
                        <th width="30%">Nama</th>
                        <th width="30%">Email</th>
                        <th width="20%">Level</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>

                    
                    
                    <?php while ($row_user = mysqli_fetch_assoc($query_user)) : ?>
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $row_user['nama'] ?></td>
                        <td><?= $row_user['email'] ?></td>
                        <td><?= $row_user['levels'] ?></td>
                        <td align="center">
                          <a href="edituser-idu=<?= $row_user['id_user']?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                          <a href="detailuser-idu=<?= $row_user['id_user']?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                          <a href="hapususer-idu=<?= $row_user['id_user']?>" class="btn btn-xs btn-warning" ><i class="fas fa-trash" title="Hapus"></i></a>                         
                        </td>
                      </tr>
                    <?php $i++ ?>
                    <?php endwhile ; ?>

                      
                      
                      
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->

           
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" <?php 
                    if($halamanaktif != 1){ $posisi = $halamanaktif-1;}
                    else{$posisi = 1;}
                    ?>href="user-halaman=<?=$posisi?>">&laquo;</a></li>
        
                    <li class="page-item"><a class="page-link" <?php 
                    if(isset($_GET["halaman"])){ $posisi = $_GET["halaman"];}
                    else if(!isset($_GET["halaman"])) {$posisi = 1;}
                    ?>
                    href="user-halaman=<?=$posisi?>"> <?=$posisi?> </a></li>
      
                    <li class="page-item"><a class="page-link" <?php 
                    if($halamanaktif != $jumlahhal ){ $posisi = $halamanaktif+1;}
                    else{$posisi = $halamanaktif;}
                    ?>href="user-halaman=<?=$posisi?>">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>
    <!-- /.content -->

