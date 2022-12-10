<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <div class="container">
        <a class="navbar-brand" href="index.php">Katalog Buku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item home active">
                    <a class="nav-link" href="index">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item aboutus">
                    <a class="nav-link" href="aboutus">About Us</a>
                </li>
                <li class="nav-item dropdown daftarbuku">
                    <a class="nav-link dropdown-toggle" href="daftarbuku" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
                    <div class="dropdown-menu primary" aria-labelledby="dropdown07">
                    <?php $kueri_kate = mysqli_query($koneksi, "SELECT *FROM kategori_buku ORDER BY kategori_buku ASC"); 
                    while ($data_kate = mysqli_fetch_assoc($kueri_kate)) {
                        $kate = $data_kate["kategori_buku"];
                    ?>
                    <a class="dropdown-item" href="daftarbuku-kategori=<?=$kate?>"><?=$kate?></a>
                    <?php }?>
                    </div>
                </li>
                <li class="nav-item blog">
                    <a class="nav-link" href="blog">Blog</a>
                </li>
                <li class="nav-item contact">
                    <a class="nav-link" href="contactus">Contact Us</a>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        </div>
    </nav>

    <script>
        const home = document.querySelector(".home");
        const aboutus = document.querySelector(".aboutus");
        const daftrabuku = document.querySelector(".daftarbuku");
        

    </script>