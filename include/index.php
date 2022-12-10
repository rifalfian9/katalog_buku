<section id="carousel-item">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="slideshow/slide-1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="slideshow/slide-2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="slideshow/slide-3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </section>
    <section id="notes-item">
        <div class="container">
            <div class="row featurette">
                <div class="col-md-7">
                  <h2 class="featurette-heading">Buku memberimu ilmu cahaya. <span class="text-muted" style="font-size:28px ;">Cahaya yang membentuk pemikiran dan kecerdasan.</span></h2>
                  <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5">
                    <img src="images/undraw_book_lover_mkck.png" class="img-fluid mx-auto featurette-image">
                  <!--<svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>-->
                </div>
            </div>
            <hr class="featurette-divider"> 
        </div>
    </section><!-- #notes-item -->
    
    <section id="product-item" >
        <div class="container">
            <h2>Koleksi Terbaru</h2> <br>
            <div class="row">
              <?php 
              $query_buku = mysqli_query($koneksi,"SELECT *FROM buku INNER JOIN kategori_buku USING (id_kategori_buku) INNER JOIN penerbit USING (id_penerbit) ORDER BY id_buku DESC LIMIT 6") ;
              while ($data_buku = mysqli_fetch_assoc($query_buku)) {
              $penerbit = $data_buku["penerbit"];
              $judulbuku = $data_buku["judul"];
              $coverbuku = $data_buku["cover"];
              $idbuku = $data_buku["id_buku"];
              ?>
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm" href= "detailbuku-idbuku=<?=$idbuku?>" >
                  <img src="admin/cover/<?=$coverbuku?>" class="img-fluid" alt="Books Collection" title="Books" height="15px">
                  <div class="card-body bg-warning">
                    <p class="card-text"><?=$judulbuku?></p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                       <a href="detailbuku-idbuku=<?=$idbuku?>" class="btn btn-primary stretched-link">Detail</a>
                      </div>
                      <small class="text-muted"><?=$penerbit?></small>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
    </section><br><br><!-- #product-item -->
   
    <section id="quotes-item" class="bg-light mt-5" style="min-height: 80px;padding:40px 0px 0px 0px;">
        <div class="container">
            <blockquote class="blockquote text-center">
                <p class="mb-0"><i>"Terpujilah cinta yang mampu mengisi kesepian manusia, dan mengakrabkan hatinya dengan manusia lain"</i></p>
                <footer class="blockquote-footer">Khalil Gibran <cite title="Source Title">Cinta dan Kesepian</cite></footer>
            </blockquote>
        </div>
    </section><br><br>
    <section id="blog-item" class="mb-4">
        <div class="container">
            <h2>Blog Terbaru</h2><br>
            <div class="row mb-2">
                <?php $query_blog = mysqli_query($koneksi,"SELECT *FROM blog INNER JOIN kategori_blog USING (id_kategori_blog) ORDER BY `tanggal` DESC LIMIT 4");
                while ($data_blog = mysqli_fetch_assoc($query_blog)) {
                    $judulblog = $data_blog["judul"];
                    $tanggalblog = $data_blog["tanggal"];
                    $kategoriblog = $data_blog["kategori_blog"];
                    $idblog = $data_blog["id_blog"];
?>
                <div class="col-md-6 hover" href="detailblog-idblog=<?=$idblog?>">
                    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static bg-light">
                        <strong class="d-inline-block mb-2 text-success"><?=$kategoriblog?></strong>
                        <h3 class="mb-0"><a href="detailblog-idblog=<?=$idblog?>"><?=$judulblog?>.</a></h3>
                        <div class="mb-1 text-muted"><?=$tanggalblog?></div>
                        <p class="mb-auto"></p>
                        <a href="detailblog-idblog=<?=$idblog?>" class="stretched-link">Continue reading</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="images/blog.jpg" class="img-fluid" title="book title here">
                        </div>
                    </div>
                </div>
                <?php }?>

            </div>
        </div>
    </section>
   