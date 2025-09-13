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
              <li class="breadcrumb-item active">Surat Keluar</li>
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
                <h3 class="card-title">Data Surat Keluar Internal</h3>
                <br>
                <a href="add.php" class="btn btn-success"> <i class="fas fa-plus"></i> Tambah Baru</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No Surat</th>
                    <th>No Agenda</th>
                    <th>Tanggal</th>
                    <th>Derajat Surat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php
                 
                 $query_surat = mysqli_query($conn, "SELECT * FROM surat_keluar WHERE jenis='I'");

                 while($data_surat = mysqli_fetch_array($query_surat)) { ?>
                  <tr>
                    <td><?= $data_surat['no_surat'] ?></td>
                    <td><?= $data_surat['no_agenda'] ?></td>
                    <td><?= $data_surat['tanggal'] ?></td>
                    <td><?= $data_surat['derajat_surat'] ?></td>
                    <td>
                    <a href="edit.php?id=<?= $data_surat['no_surat'] ?>" class="btn btn-primary">Edit</a> | <a href="../../../dist/suratMasuk/<?= $data_surat['isi'] ?>" class="btn btn-success">Download</a> | <a href="delete.php?id=<?= $data_surat['no_surat'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                 
                <?php }
                 ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No Surat</th>
                    <th>No Agenda</th>
                    <th>Tanggal</th>
                    <th>Derajat Surat</th>
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