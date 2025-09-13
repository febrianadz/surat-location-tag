<?php include 'top.php' ?>
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
        // map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
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
        document.getElementById("lat").value = p.coords.latitude.toFixed(20);
        document.getElementById("lang").value = p.coords.longitude.toFixed(20);
        var pos = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
        // map.setCenter(pos);
        // map.setZoom(14);

        var infowindow = new google.maps.InfoWindow({
          content: "<strong>yes</strong>",
        });

        // var marker = new google.maps.Marker({
        //   position: pos,
        //   map: map,
        //   title: "You are here",
        // });

        // google.maps.event.addListener(marker, "click", function () {
        //   infowindow.open(map, marker);
        // });
      }
    </script>

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
                <h3 class="card-title">Tambah Data Tanda Terima</h3>
              </div>
              <form method="POST" action="add_data.php" enctype="multipart/form-data">
                <div id="current" style="display: none">Initializing...</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <label>Nama Penerima</label>
                      <input type="text" class="form-control" name="nama_penerima" placeholder="Nama Penerima">
                    </div>
                    <div class="col">
                      <label>Nama Instansi</label>
                      <input type="text" class="form-control" name="instansi" placeholder="Nama Instansi">
                    </div>
                    <div class="col">
                      <label>Alamat Instansi</label>
                      <input type="text" class="form-control" name="alamat_ins" placeholder="Alamat Instansi">
                    </div>
                  </div>
                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Latitude</label>
                              <input type="text" class="form-control" name="lang" id="lang" readonly>
                          </div>
                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Longitude</label>
                              <input type="text" class="form-control" name="lat" id="lat" readonly>
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                        <div id="my_camera"></div>
                        <input type=button value="Take Snapshot" onClick="take_snapshot()">
                        <input type="hidden" name="image" class="image-tag">
                    </div>
                    <div class="col-md-6">
                        <div id="results">Your captured image will appear here...</div>
                    </div>
                  </div>
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

  <script language="JavaScript">

    Webcam.set({

        width: 490,

        height: 390,

        image_format: 'jpeg',

        jpeg_quality: 90

    });

  
    Webcam.attach( '#my_camera' );
  

    function take_snapshot() {

        Webcam.snap( function(data_uri) {

            $(".image-tag").val(data_uri);

            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';

        } );

    }

</script>

<?php include 'bottom.php' ?>