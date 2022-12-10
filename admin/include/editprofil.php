<?php //error_reporting(E_ALL ^ E_WARNING || E_NOTICE) ?>
<?php 
include('../koneksi/koneksi.php');
if(isset($_SESSION['id_user'])){
	$id_user = $_SESSION['id_user'];
  $sql_d = "select `nama`, `email`, `foto` from `user` 
  where `id_user` = '$id_user'";
	$query_d = mysqli_query($koneksi,$sql_d);
	while($data_d = mysqli_fetch_row($query_d)){
    $nama= $data_d[0];
    $email= $data_d[1];
    $foto = $data_d[2];
	}
}
?>





  <!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-edit"></i> Edit Profil</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="profil">Profil</a></li>
              <li class="breadcrumb-item active">Edit Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Profil</h3>
        <div class="card-tools">
          <a href="profil" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <div class="col-sm-10">
           <?php if((!empty($_GET['edit']))&&(!empty($_GET['jenis']))){?>
                <?php if($_GET['edit']=="editkosong"){?>
                    <div class="alert alert-danger" role="alert">Maaf data 
                    <?php echo $_GET['jenis'];?> wajib di isi</div>
                <?php }?>
          <?php }?>

      </div>
      <form class="form-horizontal" action="konfirmasieditprofile" method="POST" enctype="multipart/form-data">
        <div class="card-body">          
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label"><span class="text-info">
            <i class="fas fa-user-circle"></i> <u>PROFIL USER</u></span></label>
          </div>
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto Pengguna</label>
            <div class="col-sm-7">
              <img src="foto/<?= $foto?>" width="100px" height="100px" style="border-radius: 50px;">
              <h3></h3>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>  
            </div>
 
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $nama ;?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="email" id="email" value="<?php echo $email ;?>">
            </div>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>  
        </div>
        <!-- /.card-footer -->
      </form>
    </div>
    <!-- /.card -->

    </section>
