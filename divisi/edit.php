<?php include 'top.php' ?>

<?php
    if (isset($_POST['submit'])) {
        // cek keberhasilan
        if (editDivisi($_POST) > 0) {
            echo "<script>
                            alert('Data Has been Edit Succesfully');
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
              <li class="breadcrumb-item active">Divisi</li>
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
                <h3 class="card-title">Edit Data Divisi</h3>
              </div>
              <form method="POST" action="" enctype="multipart/form-data">
                <?php
                
                $id = $_GET['id'];

                $query_edit = mysqli_query($conn, "SELECT * FROM tb_divisi WHERE id_divisi='$id'");

                if($data_edit = mysqli_fetch_array($query_edit)) { ?>
                    <div class="card-body">
                            <input type="hidden" value="<?= $data_edit['id_divisi'] ?>" name="id_divisi">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Divisi</label>
                                    <input type="text" class="form-control" value="<?= $data_edit['divisi'] ?>" name="divisi" placeholder="No Email">
                                </div>
                            
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <a href="index.php" class="btn btn-danger" >Kembali</a>
                <?php
                }
                ?>
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