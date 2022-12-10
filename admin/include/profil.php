<?php 
if(isset($_SESSION['id_user']) && isset($_SESSION["levels"])){
	$id_user = $_SESSION['id_user'];
  $sql_d = "select `nama`, `email`,`levels`, `foto` from `user` 
  where `id_user` = '$id_user'";
	$query_d = mysqli_query($koneksi,$sql_d);
	while($data_d = mysqli_fetch_row($query_d)){
    $nama= $data_d[0];
    $email= $data_d[1];
    $foto= $data_d[3];
    $levels = $data_d[2];
	}
}?>
 <?php error_reporting(E_ALL ^ E_WARNING || E_NOTICE) ?>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Profil</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="editprofil" class="btn btn-sm btn-info float-right"><i class="fas fa-edit"></i> Edit Profil</a>
                </div>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <?php if ($_GET["edit"] == "editberhasil"){?>
                <div class="col-sm-12">
                    <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
                </div>
                <?php }?>
                <table class="table table-bordered">
                    <tbody>  
                      <tr>
                        <td colspan="2"><i class="fas fa-user-circle"></i> <strong>PROFIL<strong></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Foto<strong></td>
                        <td width="80%">
                            <img src="foto/<?php echo $foto; ?>" width="200px" >
                        </td>
                      </tr>                
                      <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%"><?php echo $nama ?></td>
                      </tr>                
                      <tr>
                        <td width="20%"><strong>Email<strong></td>
                        <td width="80%"><?php echo $email?> </td>
                      </tr> 
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
