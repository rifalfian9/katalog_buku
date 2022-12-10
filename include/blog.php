
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">BLOG</h1>
      </div>
    </section><br><br>
    <section id="blog-list">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9 blog">
            <?php $query_blogdetail = mysqli_query($koneksi, "SELECT *FROM blog INNER JOIN user USING (id_user) INNER JOIN kategori_blog USING (id_kategori_blog) ORDER BY tanggal DESC LIMIT 4");

                if(isset($_GET["kategoriblog"])){
                    $query_blogdetail = mysqli_query($koneksi, "SELECT *FROM blog INNER JOIN user USING (id_user) INNER JOIN kategori_blog USING (id_kategori_blog) WHERE kategori_blog = '$_GET[kategoriblog]' ORDER BY judul ");
                }
                 else if(isset($_GET["arsip"])){
                    $query_blogdetail = mysqli_query($koneksi, "SELECT *FROM blog INNER JOIN user USING (id_user) INNER JOIN kategori_blog USING (id_kategori_blog) WHERE date_format(tanggal, '%M') = '$_GET[arsip]' ORDER BY judul ");
                }

            while ($data_blogdetail = mysqli_fetch_assoc($query_blogdetail)){
              $judulblog = $data_blogdetail["judul"];
              $nomer = $data_blogdetail["id_blog"];
              $tanggalblog = $data_blogdetail["tanggal"];
              $penulisblog =$data_blogdetail["nama"];
            
            ?>
            <div class="blog-post  shadow p-3 mb-1 bg-body rounded"  >
              <h2 class="blog-post-title"><a href="detailblog-idblog=<?=$nomer?>"><?=$judulblog?></a></h2>
              <p class="blog-post-meta"><?=$tanggalblog?> by <a href=""><?=$penulisblog?></a></p>
              <!--<img src="slideshow/slide-1.jpg" class="img-fluid" alt="Responsive image"><br><br>-->
      
              <p><?=$nomer?> <a href="">dis parturient montes</a>, nascetur 
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia  temporibus iste porro molestias quas..</p>
                <a href="detailblog-idblog=<?=$nomer?>" class="btn btn-primary">Continue reading..</a>
              </div><!-- /.blog-post --><br><br>
            <?php } ?>
           
            <nav class="blog-pagination">
              <a class="btn btn-outline-primary" href="#">Older</a>
              <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
            </nav>
    
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
                $arsip = mysqli_query($koneksi, "SELECT DISTINCT date_format(tanggal, '%M') as bulantahun FROM blog ORDER BY date_format(tanggal, '%M') ASC");
                while ($data_arsip = mysqli_fetch_assoc($arsip)) { ?>
                    <li><a href="blog-arsip=<?=$data_arsip["bulantahun"]?>"> <?=$data_arsip["bulantahun"]?> </a></li>
                <?php } ?>
              </ol>
            </div>
      
            
          </aside><!-- /.blog-sidebar -->
      
        </div><!-- /.row -->
      
      </main><!-- /.container -->
    </section><br><br>
    