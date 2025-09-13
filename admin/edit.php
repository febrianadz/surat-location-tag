<?php include 'top.php' ?>

<?php
    if (isset($_POST['submit'])) {
        // cek keberhasilan
        if (editUser($_POST) > 0) {
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
              <li class="breadcrumb-item active">Edit Admin</li>
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
                <h3 class="card-title">Edit Data Admin</h3>
              </div>
              <form method="POST" action="" enctype="multipart/form-data">
                <?php
                
                $id = $_GET['id'];

                $query_edit = mysqli_query($conn, "SELECT * FROM tb_user a LEFT JOIN tb_divisi b ON b.id_divisi=a.id_divisi LEFT JOIN tb_jabatan c ON c.id_jabatan = a.id_jabatan WHERE a.id_user='$id'");

                if($data_edit = mysqli_fetch_array($query_edit)) { ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                            <input type="hidden" value="<?= $data_edit['id_user'] ?>" name="id_user">
                            <input type="hidden" value="<?= $data_edit['foto'] ?>" name="fotoLama">
                            <input type="hidden" value="<?= $data_edit['level'] ?>" name="level">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" value="<?= $data_edit['name'] ?>" name="name" placeholder="No Email">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="<?= $data_edit['tgl_lahir'] ?>" name="tgl_lahir">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">No Telefon</label>
                                    <input type="text" class="form-control" value="<?= $data_edit['no_telfon'] ?>" name="no_telfon" placeholder="No Telefon">
                                </div>
                            </div>
                        </div>
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select class="form-control select2" name="id_jabatan" style="width: 100%;">
                                    <option value="<?= $data_edit['id_jabatan'];?>"><?= $data_edit['jabatan'] ?></option>
                                    <?php
                                        
                                    $query_jabatan = mysqli_query($conn, "SELECT * FROM tb_jabatan");

                                    while($data_jabatan = mysqli_fetch_array($query_jabatan)) { ?>
                                        <option value="<?= $data_jabatan['id_jabatan'];?>"><?= $data_jabatan['jabatan'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                    <label for="divisi">Divisi</label>
                                    <select class="form-control select2" name="id_divisi" style="width: 100%;">
                                        <option value="<?= $data_edit['id_divisi'];?>"><?= $data_edit['divisi'] ?></option>
                                        <?php
                                            
                                        $query_divisi = mysqli_query($conn, "SELECT * FROM tb_divisi");

                                        while($data_divisi = mysqli_fetch_array($query_divisi)) { ?>
                                            <option value="<?= $data_divisi['id_divisi'];?>"><?= $data_divisi['divisi'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="<?= $data_edit['email'] ?>" name="email" placeholder="email">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" value="<?= $data_edit['password'] ?>" name="password" placeholder="Hal">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >File input</label> <br>
                        <img src="../../../dist/user/<?= $data_edit['foto'] ?>" alt="<?= $data_edit['foto'] ?>" width="200">
                        <br> <br>
                            <div class="input-group">
                                <div class="costum-file">
                                
                                <input type="file" name="foto" id="exampleInputFile" class="custom-file-input">
                                <label class="custom-file-label" for="exampleInputFile"></label>
                                </div>
                            </div>
                    </div>
                    <input class="form-check-input" type="hidden" name="jenis" value="E">
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