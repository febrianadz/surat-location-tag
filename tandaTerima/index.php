<?php include 'top.php' ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../">Home</a></li>
              <li class="breadcrumb-item active">Tanda Terima</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Tanda Terima</h3>
                <a href="add.php" class="btn btn-success"> <i class="fas fa-plus"></i> Tambah Baru</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nama Penerima</th>
                    <th>Nama Instansi</th>
                    <th>Alamat Instansi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php
                 
                 $query_laporan = mysqli_query($conn, "SELECT * FROM tb_laporan");

                 while($data_laporan = mysqli_fetch_array($query_laporan)) { ?>
                  <tr>
                    <td><?= $data_laporan['nama_penerima'] ?></td>
                    <td><?= $data_laporan['instansi'] ?></td>
                    <td><?= $data_laporan['alamat_ins'] ?></td>
                    <td>
                      <a href="view.php?id=<?= $data_laporan['id_laporan'] ?>" class="btn btn-primary">View</a> | <a href="delete.php?id=<?= $data_laporan['id_laporan'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                 
                <?php }
                 ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nama Penerima</th>
                    <th>Nama Instansi</th>
                    <th>Alamat Instansi</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'bottom.php' ?>