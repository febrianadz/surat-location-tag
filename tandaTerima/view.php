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
              <li class="breadcrumb-item active">View Tanda Terima</li>
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
                <h3 class="card-title">View Data Tanda Terima</h3>
              </div>
              <form method="POST" action="" enctype="multipart/form-data">
                <?php
                
                $id = $_GET['id'];

                $query_edit = mysqli_query($conn, "SELECT * FROM tb_laporan WHERE id_laporan='$id'");

                if($data_edit = mysqli_fetch_array($query_edit)) { ?>
                <script>
                  function initialize_map() {
                        var myOptions = {
                          zoom: 4,
                          mapTypeControl: true,
                          mapTypeControlOptions: { style: google.maps.MapTypeControlStyle.DROPDOWN_MENU },
                          navigationControl: true,
                          navigationControlOptions: { style: google.maps.NavigationControlStyle.SMALL },
                          mapTypeId: google.maps.MapTypeId.ROADMAP,
                        };
                        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                      }
                      function initialize() {
                        if (geo_position_js.init()) {
                          document.getElementById("current").innerHTML = "Receiving...";
                          geo_position_js.getCurrentPosition(
                            show_position,
                            function () {
                              document.getElementById("current").innerHTML = "Couldn't get location";
                            },
                            { enableHighAccuracy: true }
                          );
                        } else {
                          document.getElementById("current").innerHTML = "Functionality not available";
                        }
                      }

                      function show_position(p) {
                        // document.getElementById("current").innerHTML = "latitude=" + p.coords.latitude.toFixed(50) + " longitude=" + p.coords.longitude.toFixed(50);
                        var pos = new google.maps.LatLng(<?=  $data_edit['lat'] ?>, <?= $data_edit['lang'] ?>);
                        map.setCenter(pos);
                        map.setZoom(14);

                        var infowindow = new google.maps.InfoWindow({
                          content: "<strong>yes</strong>",
                        });

                        var marker = new google.maps.Marker({
                          position: pos,
                          map: map,
                          title: "You are here",
                        });

                        google.maps.event.addListener(marker, "click", function () {
                          infowindow.open(map, marker);
                        });
                      }
                </script>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" value="<?= $data_edit['nama_penerima'] ?>" name="nama_penerima" placeholder="No Email">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Nama Instansi</label>
                                    <input type="text" class="form-control" value="<?= $data_edit['instansi'] ?>" name="instansi">
                                </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat Instansi</label>
                                    <input type="text" class="form-control" value="<?= $data_edit['alamat_ins'] ?>" name="alamat_ins" placeholder="No Telefon">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Waktu</label>
                                    <input type="text" class="form-control" value="<?= $data_edit['time'] ?>" name="time" placeholder="No Telefon">
                                </div>
                            </div>
                        </div>
                        <div id="map_canvas" style="width: 100%; height: 200px"></div>
                        <div id="current" style="display: none">Initializing...</div>
                        <a href="index.php" class="btn btn-danger mt-3" >Kembali</a>
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