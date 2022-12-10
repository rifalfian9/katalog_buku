
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">DETAIL KATALOG</h1>
      </div>
    </section><br><br>
    <section id="katalog-wrapper">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9 katalog-detail">
            <div class="table-responsive">
              <?php $query_detailbuku = mysqli_query($koneksi, "SELECT *FROM buku INNER JOIN penerbit USING (id_penerbit) INNER JOIN kategori_buku USING (id_kategori_buku) WHERE id_buku = '$_GET[idbuku]' ");
              while ($data_detailbuku = mysqli_fetch_assoc($query_detailbuku)) {
                $tahun_terbit = $data_detailbuku["tahun_terbit"];
                $penerbit = $data_detailbuku["penerbit"];
                $pengarang = $data_detailbuku["pengarang"];
                $judul = $data_detailbuku["judul"];
                $kategori_buku = $data_detailbuku["kategori_buku"];
                $sinopsis = $data_detailbuku["sinopsis"];
              }

              ?>
              <table class="table table-bordered">
                <tr>
                  <td width="40%" rowspan="6"><img src="imgbook/books.jpg" class="img-fluid" alt="Books Collection" title="Books"></td>
                  <td colspan="2"><h4><?=$judul?></h4></td>
                </tr>
                <tr>
                  <td width="17%"><strong>Penulis</strong></td>
                  <td width="43%"><?=$pengarang?></td>
                </tr>
                <tr>
                  <td><strong>Penerbit</strong></td>
                  <td><?=$penerbit?></td>
                </tr>
                <tr>
                  <td><strong>Tahun Terbit</strong></td>
                  <td><?=$tahun_terbit?></td>
                </tr>
                <tr>
                  <td><strong>Kategori Buku</strong></td>
                  <td><?=$kategori_buku?></td>
                </tr>
                <tr>
                  <td><strong>Tag</strong></td>
                  <td> 
                    <?php $query_tagbuku = mysqli_query($koneksi, "SELECT *FROM tag_buku INNER JOIN tag USING (id_tag) WHERE id_buku = '$_GET[idbuku]' ");
                  while ($data_tagbuku = mysqli_fetch_assoc($query_tagbuku)){
                    $tag = $data_tagbuku["tag"];
                  ?><a href="#"> <?=$tag?> </a><br>  <?php } ?>
                  </td>
                 
                </tr>
                <tr>
                  <td colspan="3">
                    <h5>Sinopsis</h5>
                    <p><?=$sinopsis?></p>
                  </td>
                </tr>
              </table>
            </div><!-- .table-responsive -->

          </div><!-- /.blog-main -->
      
          <aside class="col-md-3 katalog-sidebar">
      
            
           <div class="pl-4 pb-4">
              <h4 class="font-italic">Buku Terkait</h4>
              <ol class="list-unstyled mb-0">
                <?php $querysqli_buku = mysqli_query($koneksi, "SELECT *FROM buku INNER JOIN kategori_buku USING (id_kategori_buku) WHERE kategori_buku = '$_GET[kategor]' ORDER BY judul ASC ") ;
                while ($data_terkait = mysqli_fetch_assoc($querysqli_buku)) {
                  $judulterkait = $data_terkait["judul"];
                  $idbukuterkait = $data_terkait["id_buku"];
                  $kategorbuku = $data_terkait["kategori_buku"]
                ?>
                <li><a href="detailbuku-idbuku=<?=$idbukuterkait?>-kategor=<?= $kategorbuku ?>"><?=$judulterkait?></a></li>
               <?php } ?>
              </ol>
            </div>

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
          </aside><!-- /.blog-sidebar -->
      
        </div><!-- /.row -->
      
      </main><!-- /.container -->
    </section><br><br>
    