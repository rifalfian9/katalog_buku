
<?php 

error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
?> 

  <?php
  
  $_SESSION["idu"] = $_GET["idu"];
  $sql_edituser = "SELECT `nama`,`password`, `email`, `username`, `levels` , `foto` FROM `user` WHERE `id_user` ='$_GET[idu]' ";
  $query_edituser = mysqli_query($koneksi, $sql_edituser);
  while ($data_edituser= mysqli_fetch_assoc($query_edituser)){

  $_SESSION["nama"] = $data_edituser['nama'];
  $_SESSION["email"]= $data_edituser['email'];
  $_SESSION["username"]  = $data_edituser['username'];
  $_SESSION["levels"] = $data_edituser['levels'];
  $_SESSION["foto"]=$data_edituser["foto"];
  $_SESSION["password"] =$data_edituser['password'];
}

  ?>

  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Data User</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="user">Data User</a></li>
              <li class="breadcrumb-item active">Edit Data User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data User</h3>
        <div class="card-tools">
          <a href="user" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <?php if($_GET["edit"]  && $_GET["edit"] == "gagal") :?>
      <div class="col-sm-10">
          <div class="alert alert-danger" role="alert">Maaf data wajib di isi</div>
      </div>
      <?php endif ;?>

      <form class="form-horizontal" action="konfirmasiedituser" method="post" enctype="multipart/form-data" >
      <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label"><span class="text-info"><i class="fas fa-user-circle"></i> <u>Data User</u></span></label>
          </div>
          
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto </label>
            <div class="col-sm-7">
              <img src="foto/<?php echo $_SESSION["foto"] ?>" width="100px" height="100px" style="border-radius: 50px;">
              <h3></h3>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto" id="customFile" value="<?php echo $_SESSION["foto"]?>" >
                <input type="hidden" class="custom-file-input" name="fotolama" id="customFile" value="<?php echo $_SESSION["foto"]?>" >
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $_SESSION["nama"] ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION["email"] ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="username" id="username" value="<?php echo $_SESSION["username"] ?>" >
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" name="password" id="password" value="" >
              <span class="text-danger" style="font-weight:lighter;font-size:12px">
               *Jangan diisi jika tidak ingin mengubah password</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="level" class="col-sm-3 col-form-label">Level</label>
            <div class="col-sm-7">
              <select class="form-control" id="jurusan" name="level" value="">
                <option value="<?=$_SESSION["levels"]?>"> <?=$_SESSION["levels"]?> </option>
                <option value="superadmin">superadmin</option>
                <option value="admin">admin</option>
              </select>
            </div>
          </div>
          </div>
        </div>

      </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right" name="submit"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
