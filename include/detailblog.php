    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">BLOG</h1>
      </div>
    </section><br><br>
    <section id="blog-list">
      <?php 
      $query_detailblog = mysqli_query($koneksi, "SELECT *FROM blog INNER JOIN user USING (id_user) INNER JOIN kategori_blog USING (id_kategori_blog)
      WHERE id_blog = '$_GET[idblog]'");
    while ($data_detailblog = mysqli_fetch_assoc($query_detailblog)){
        $tanggal_blog = $data_detailblog["tanggal"];
        $judul_blog = $data_detailblog["judul"];
        $isi_blog = $data_detailblog["isi"];
        $penulis_blog = $data_detailblog["nama"];
    }
      
      ?>
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9 blog-main">
            <div class="blog-post">
              <h2 class="blog-post-title"><?=$judul_blog?></h2>
              <p class="blog-post-meta"><?=$tanggal_blog?> by <a href="#"><?=$penulis_blog?></a></p>

              <p style="text-align:justify;"><?=$isi_blog?></p>
            </div><br><br>

           

          </div><!-- /.blog-main -->
      
          <aside class="col-md-3 blog-sidebar">
      
            <div class="pl-4 pb-4">
              <h4 class="font-italic">Kategori</h4>
              <ol class="list-unstyled mb-0">
                <?php $query_ktblog = mysqli_query($koneksi, "SELECT *FROM kategori_blog  ORDER BY kategori_blog LIMIT 20");
                  while ($data_ktblog = mysqli_fetch_assoc($query_ktblog)){
                    $ktblog = $data_ktblog["kategori_blog"];
                  ?>
                <li><a href="blog-kategoriblog=<?=$ktblog?>"><?=$ktblog?></a></li>
                <?php } ?>
            </div>
      
            <div class="p-4">
              <h4 class="font-italic">Archives</h4>
              <ol class="list-unstyled mb-0">
                <?php 
                $arsip = mysqli_query($koneksi, "SELECT DISTINCT date_format(tanggal, '%M') as bulantahun FROM blog ORDER BY date_format(tanggal, '%M') ");
                while ($data_arsip = mysqli_fetch_assoc($arsip)) { ?>
                    <li><a href="blog-arsip=<?=$data_arsip["bulantahun"]?>"> <?=$data_arsip["bulantahun"]?> </a></li>
                <?php } ?>
              </ol>
            </div>
      
            
          </aside><!-- /.blog-sidebar -->
      
        </div><!-- /.row -->
      
      </main><!-- /.container -->
    </section><br><br>
  