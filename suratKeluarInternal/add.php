<?php include 'top.php' ?>

<?php
    if (isset($_POST['submit'])) {
        // cek keberhasilan
        if (addSuratKeluar($_POST) > 0) {
            echo "<script>
                            alert('Data Has been Upload Succesfully');
                            document.location.href = './'
                        </script>";
        } else {
            echo "<script>
                            alert('Data has failed!');
                            document.location.href = './'
                        </script>";
            echo mysqli_error($conn);
        }
    } 
?>

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
                <h3 class="card-title">Tambah Data Surat Keluar</h3>
              </div>
              <form method="POST" action="" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Agenda</label>
                                <input type="text" class="form-control" name="no_agenda" placeholder="No Email">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Asal Surat</label>
                                <input type="text" class="form-control" name="asal_surat" placeholder="Asal Surat">
                            </div>
                        </div>
                    </div>
                  
                  <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Kepada</label>
                            <input type="text" class="form-control" name="kepada" placeholder="Tujuan Surat">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Tembusan</label>
                            <input type="text" class="form-control" name="tembusan" placeholder="Tembusan">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Hal</label>
                            <input type="text" class="form-control" name="hal" placeholder="Hal">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Jumlah Copy</label>
                            <input type="number" class="form-control" name="jumlah_copy" placeholder="Jumlah Copy">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label>Derajat Surat</label>
                            <input type="text" class="form-control" name="derajat_surat" placeholder="Derajat Surat">
                        </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Sarana Komunikasi</label>
                            <input type="text" class="form-control" name="sarana_komunikasi" placeholder="Sarana Komunikasi">
                        </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <label >File input</label>
                          <div class="input-group">
                            <div class="costum-file">
                              <input type="file" name="file_surat" id="exampleInputFile" class="custom-file-input">
                              <label class="custom-file-label" for="exampleInputFile"></label>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <input class="form-check-input" type="hidden" name="jenis" value="I">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <a href="index.php" class="btn btn-danger" >Kembali</a>
              </form>
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