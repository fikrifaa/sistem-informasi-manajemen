<?php
require_once 'php_action/db_connect.php';
require_once 'php_action/do_login.php';
if(isset($_SESSION['id_petugas'])) {
  header ("location:dashboard.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Climate Hub | Admin Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <link href="../images/UNFCCC_logo.svg" rel="shortcut icon">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../assets/adminLogin/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<!-- <div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Welcome, Please Sign In</h2>
				</div> -->
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(../images/rain.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<!-- <div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div> -->

                <?php
                if ($errors) {
                  foreach ($errors as $key => $value) {
                    echo '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <i class="fa fa-exclamation-triangle"></i>   '.$value.'
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
                    </div>
                    ';
                  }
                }
              ?>

			      	</div>
              <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Username</label>
			      			<input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="off" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
		            </div>
		            <div class="form-group">
                <button type="submit" class="btn btn-outline-dark btn-block" name="login"> <i class="fa fa-sign-in"></i> Sign in</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox">
									  <span class="checkmark"></span>
										</label>
									</div>
									<!-- <div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div> -->
		            </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../assets/adminLogin/js/jquery.min.js"></script>
  <script src="../assets/adminLogin/js/popper.js"></script>
  <script src="../assets/adminLogin/js/bootstrap.min.js"></script>
  <script src="../assets/adminLogin/js/main.js"></script>

	</body>
</html>