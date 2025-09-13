<?php

session_start();

include 'function/function.php';

if (isset($_POST["submit"])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE email='$email' AND password='$password'");
    $data = mysqli_fetch_array($query);
	
	if ($data > 0) {
        if ($data['level'] == 1) {
            $_SESSION['status'] = 'login';
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['level'] = 1;
            header('Location:Dashboard/admin/');
        } elseif ($data['level'] == 2) {
            $_SESSION['status'] = 'login';
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['level'] = 2;
            header('Location:Dashboard/pegawai/');
        }
    } else {
        echo "<script>
                    alert('username atau Password Salah!');
                    document.location.href = 'signin'
                </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Arsip Surat | PUSDATIN KEMHAN</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="dist/img/logo1.jpg" type="image/x-icon">
  <link id="theme-style" rel="stylesheet" href="dist/css/portal.css">
</head>
<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper ">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4">
              <a class="app-logo" href="index.html">
                <img class="logo-icon me-2" src="dist/img/logo1.jpg" alt="logo">
              </a>
            </div>
					<h2 class="auth-heading text-center mb-5">Log in to Portal</h2>
			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" method="post" action="">         
							<div class="email mb-3">
								<label class="sr-only" for="signin-email">Email</label>
								<input id="signin-email" type="email" class="form-control signin-email" name="email" placeholder="Email address" required="required">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="signin-password">Password</label>
								<input id="signin-password" type="password" class="form-control signin-password" name="password" placeholder="Password" required="required">
								
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto" style="background-color: #a42715;" name="submit">Log In</button>
							</div>
						</form>
						
						
					</div><!--//auth-form-container-->	

			    </div><!--//auth-body-->
		    
			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
              <small class="copyright">Copyright &copy by PUSDATIN KEMHAN RI</small>
				    </div>
			    </footer><!--//app-auth-footer-->	
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">
		    </div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Portal Surat PUSDATIN KEMHAN RI</h5>
					    <div>Selamat datang di situs pengarsipan surat dari PUSDATIN KEMHAN RI.</div>
				    </div>
				</div>
		    </div><!--//auth-background-overlay-->
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
