
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">CONTACT US</h1>
      </div>
    </section><br><br>
    <section id="blog-list">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9">
            <form action="" method="post" >
            <fieldset>
              <legend>Form Contact Us</legend><br>
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" name="nama" class="form-control" id="inputNama">
                </div>
              </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="inputEmail3">
              </div>
            </div>
            <div class="form-group row">
              <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="inputPesan" rows="7" name="pesan" ></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
              </div>
            </div>
          </fieldset>
          </form>
          </div><!-- /.blog-main -->
      
          <aside class="col-md-3 blog-sidebar">
            <div class="p-4">
              <h4 class="font-italic">Social Media</h4>
              <ol class="list-unstyled">
                <li><a href="https://github.com/rifalfian9">GitHub</a></li>
                <li><a href="https://www.instagram.com/rifqii.akml/">Twitter</a></li>
                <li><a href="https://www.instagram.com/rifqii.akml/">Facebook</a></li>
                <li><a href="https://www.instagram.com/rifqii.akml/">Instagram</a></li>
              </ol>
            </div>
          </aside> <!-- /.blog-sidebar -->
      
        </div><!-- /.row -->
      
      </main><!-- /.container -->
    </section><br><br>
    <?php 
    if (isset($_POST["kirim"])){

      if (empty($_POST["nama"]) || empty($_POST["email"]) || empty($_POST["pesan"]) ) {
        echo "<script> alert('field tidak boleh kosong');</script>";
      }
      else if (!empty($_POST["nama"]) && !empty($_POST["email"]) && !empty($_POST["pesan"]) ) {

        $query_kontak = "INSERT INTO contact VALUES ('', '$_POST[nama]', '$_POST[email]', '$_POST[pesan]') ";
        mysqli_query($koneksi, $query_kontak );
        echo "<script> alert('berhasil kirim pesan');</script>";
      }


      
    
    }
    ?>
    