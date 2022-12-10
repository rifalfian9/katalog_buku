<?php 
error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
    $data_tampil = 6;
              $query_jumlahdata = mysqli_query($koneksi,"SELECT *FROM buku" );
              $jumlahdata = mysqli_num_rows($query_jumlahdata);
             
              $halamanaktif = (isset($_GET["halaman"])) ? $halamanaktif = $_GET["halaman"] : $halamanaktif = 1;
              $awaldata = ($data_tampil * $halamanaktif) - $data_tampil ;

              $jumlahhal = ceil($jumlahdata/$data_tampil);



?>
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">DAFTAR BUKU</h1>
      </div>
    </section><br><br>
    
    <?php 
              if (isset($_GET["kategori"])) {
              $query_listbuku = mysqli_query($koneksi,"SELECT *FROM buku INNER JOIN penerbit USING (id_penerbit) INNER JOIN kategori_buku USING (id_kategori_buku) WHERE `kategori_buku` = '$_GET[kategori]' ORDER BY kategori_buku LIMIT $awaldata,$data_tampil ");
                $value = $_GET["kategori"];
                $kriteria = "CATEGORIES : ";
            }
              
              else if (isset($_GET["idtag"])) {
                $query_listbuku = mysqli_query($koneksi,"SELECT *FROM buku INNER JOIN penerbit USING (id_penerbit) INNER JOIN kategori_buku USING (id_kategori_buku) INNER JOIN tag_buku USING (id_buku) WHERE id_tag = '$_GET[idtag]' ORDER BY kategori_buku");

                $que = mysqli_query($koneksi,"SELECT *FROM tag_buku INNER JOIN tag USING (id_tag) WHERE id_tag = '$_GET[idtag]' ORDER BY tag");
                while($dataque =mysqli_fetch_assoc($que)){
                  $value = $dataque["tag"];
                  $kriteria = "TAG : ";
                }
               }

              ?>

    <section id="katalog-item">
      <main role="main" class="container">
        <h2 class="text-primary"><?=$kriteria?>  <?=$value?></h2><br><br>
        <div class="row">
          <div class="col-md-9 katalog-main">
            <div class="row">

             <?php  while($data_listbuku = mysqli_fetch_assoc($query_listbuku)) {
                $idbuku = $data_listbuku["id_buku"];
                $penerbit = $data_listbuku["penerbit"];
                $judul = $data_listbuku["judul"];
                $cover = $data_listbuku["cover"];
                $kategor = $data_listbuku["kategori_buku"];

               
              ?>
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <img src="admin/cover/<?=$cover?>" class="img-fluid" alt="Books Collection" title="Books">
                  <div class="card-body bg-warning">
                    <p class="card-text" style="font-size: 14px;"><?=$judul?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                      <a href="detailbuku-idbuku=<?=$idbuku?>-kategor=<?=$kategor?>" class="btn btn-primary stretched-link">Detail</a>
                      </div>
                      <small class="text-muted"><?=$penerbit?></small>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
              
           
            <div class="col-sm-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                       <?php 
                      if (isset($_GET["kategori"])) { ?>
                          <li class="page-item"><a class="page-link"
                          <?php if($halamanaktif != 1){ $posisi = $halamanaktif-1;}
                            else{$posisi = 1;}
                            ?>href="daftarbuku-kategori=<?=$_GET["kategori"]?>-halaman=<?=$posisi?>"
                              ><strong> << </strong></a></li>

                          <li class="page-item"><a class="page-link" <?php 
                              if(isset($_GET["halaman"])){ $posisi = $_GET["halaman"];}
                              else if(!isset($_GET["halaman"])) {$posisi = 1;}
                              ?>href="daftarbuku-kategori=<?=$_GET["kategori"]?>-halaman=<?=$posisi?>"
                              ><?=$posisi?></a></li> 

                          <li class="page-item"><a class="page-link" <?php 
                              if($halamanaktif != $jumlahhal ){ $posisi = $halamanaktif+1;}
                              else{$posisi = $halamanaktif;}
                              ?>href="daftarbuku-kategori=<?=$_GET["kategori"]?>-halaman=<?=$posisi?>"
                              ><strong> >> </strong></a></li>
                      <?php } else { ?>
                              <li class="page-item"><a class="page-link"
                             <?php if($halamanaktif != 1){ $posisi = $halamanaktif-1;}
                              else{$posisi = 1;}
                                ?> href="daftarbuku-idtag=<?=$_GET["idtag"]?>-halaman=<?=$posisi?>"> 
                                <strong> << </strong></a></li>

                              <li class="page-item"><a class="page-link" <?php 
                                  if(isset($_GET["halaman"])){ $posisi = $_GET["halaman"];}
                                  else if(!isset($_GET["halaman"])) {$posisi = 1;}
                                  ?>href="daftarbuku-idtag=<?=$_GET["idtag"]?>-halaman=<?=$posisi?>"
                                  ><?=$posisi?></a></li> 

                              <li class="page-item"><a class="page-link" <?php 
                                  if($halamanaktif != $jumlahhal ){ $posisi = $halamanaktif+1;}
                                  else{$posisi = $halamanaktif;}
                                  ?>href="daftarbuku-idtag=<?=$_GET["idtag"]?>-halaman=<?=$posisi?>"
                                  ><strong> >> </strong></a></li>
                        <?php } ?>
                        
                  </ul>
                </nav>
            </div>  

            </div><!-- .row-->

          </div><!-- /.katalog-main -->
      
          <aside class="col-md-3 katalog-sidebar">
      
            <div class="pl-4 pb-4">
              <h4 class="font-italic">Kategori</h4>
              <ol class="list-unstyled mb-0">
                <?php $query_ktbuku = mysqli_query($koneksi, "SELECT *FROM kategori_buku  ORDER BY kategori_buku LIMIT 20");
                  while ($data_ktbuku = mysqli_fetch_assoc($query_ktbuku)){
                    $ktbuku = $data_ktbuku["kategori_buku"];
                  ?>
                <li><a href="daftarbuku-kategori=<?=$ktbuku?>"><?=$ktbuku?></a></li>
                <?php } ?>
            </div>
      
            <div class="p-4">
              <h4 class="font-italic">Tag</h4>
              <ol class="list-unstyled">
                <?php $query_tagebuku = mysqli_query($koneksi, "SELECT *FROM tag  ORDER BY tag LIMIT 20");
                  while ($data_tagebuku = mysqli_fetch_assoc($query_tagebuku)){
                    $tage = $data_tagebuku["tag"];
                    $idtage = $data_tagebuku["id_tag"];
                  ?>
                <li><a href="daftarbuku-idtag=<?=$idtage?>"><?=$tage?></a></li>
                <?php } ?>
              </ol>
            </div>
          </aside> <!-- /.katalog-sidebar -->
      
        </div><!-- /.row -->
      </main><!-- /.container -->
    </section><br><br>
   