<?php
 $data_tampil = 5;
              $query_jumlahdata = mysqli_query($koneksi,"SELECT * FROM blog" );
              $jumlahdata = mysqli_num_rows($query_jumlahdata);
             
              $halamanaktif = (isset($_GET["halaman"])) ? $halamanaktif = $_GET["halaman"] : $halamanaktif = 1;
              $awaldata = ($data_tampil * $halamanaktif) - $data_tampil ;

              $jumlahhal = ceil($jumlahdata/$data_tampil);

$sql_blog =  "SELECT *FROM `blog` INNER JOIN `kategori_blog` USING (`id_kategori_blog`) LIMIT $awaldata,$data_tampil";

if (isset($_POST["search"])){
                $katakunci = $_POST["katakunci"];
                $sql_blog=  "SELECT * FROM `blog` INNER JOIN `kategori_blog` USING (`id_kategori_blog`) where 
                 
                `judul` LIKE '%$katakunci%' OR
                `kategori_blog` LIKE '%$katakunci%' OR
                `tanggal` LIKE '%$katakunci%'";
                }
                
$query_blog = mysqli_query($koneksi,$sql_blog);


?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fab fa-blogger"></i> Blog</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"> Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Blog</h3>
                <div class="card-tools">
                  <a href="tambahblog" class="btn btn-sm btn-info float-right">
                  <i class="fas fa-plus"></i> Tambah Blog</a>
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
                          <button type="submit"  name="search" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
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
                        <th width="30%">Kategori</th>
                        <th width="30%">Judul</th>
                        <th width="20%">Tanggal</th>
                        <th width="15%"><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        $no = 1 ;
                          while ($data_blog = mysqli_fetch_assoc($query_blog)) {
                              $judul = $data_blog["judul"] ;
                              $tanggal =$data_blog["tanggal"] ;
                              $kategori_blog = $data_blog["kategori_blog"] ;
                              $id_blog = $data_blog["id_blog"];
                            
                           
                        ?>
                        <td><?=$no?>.</td>
                        <td><?=$kategori_blog?></td>
                        <td><?=$judul?></td>
                        <td><?=$tanggal?></td>
                        <td align="center">
                          <a href="editblog-idkb=<?=$id_blog?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                          <a href="detailblog-idkb=<?=$id_blog?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                          <a href="hapusblog-idkb=<?=$id_blog?>" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></a>                         
                        </td>
                      </tr>
                      <?php
                          $no++;
                          }?>
                      
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                   <li class="page-item"><a class="page-link" <?php 
                    if($halamanaktif != 1){ $posisi = $halamanaktif-1;}
                    else{$posisi = 1;}
                    ?>href="blog-halaman=<?=$posisi?>">&laquo;</a></li>
        
                    <li class="page-item"><a class="page-link" <?php 
                    if(isset($_GET["halaman"])){ $posisi = $_GET["halaman"];}
                    else if(!isset($_GET["halaman"])) {$posisi = 1;}
                    ?>
                    href="blog-halaman=<?=$posisi?>"> <?=$posisi?> </a></li>
      
                    <li class="page-item"><a class="page-link" <?php 
                    if($halamanaktif != $jumlahhal ){ $posisi = $halamanaktif+1;}
                    else{$posisi = $halamanaktif;}
                    ?>href="blog-halaman=<?=$posisi?>">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

    </section>

