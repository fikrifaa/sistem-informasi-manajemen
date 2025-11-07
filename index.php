<?php
require_once 'php_action/db_connect.php';
include_once 'php_action/do_login.php';
include_once 'php_action/do_register.php';
include_once 'php_action/do_kirimLaporan.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8">
	<title>Portal Pengaduan Masyarakat</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="images/pengaduan_icon.png" rel="shortcut icon">

	<!-- stylesheets css -->
	<link rel="stylesheet" href="assets/public/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/public/css/animate.min.css">
	<link rel="stylesheet" href="assets/public/css/et-line-font.css">
	<link rel="stylesheet" href="assets/public/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/public/css/vegas.min.css">

	<link href="https://fonts.googleapis.com/css?family=Rajdhani:400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Teko" rel="stylesheet">
<link rel="stylesheet" href="assets/public/css/style.css">
</head>

<body>

	<section class="preloader">
		<div class="sk-circle">
			<div class="sk-circle1 sk-child"></div>
			<div class="sk-circle2 sk-child"></div>
			<div class="sk-circle3 sk-child"></div>
			<div class="sk-circle4 sk-child"></div>
			<div class="sk-circle5 sk-child"></div>
			<div class="sk-circle6 sk-child"></div>
			<div class="sk-circle7 sk-child"></div>
			<div class="sk-circle8 sk-child"></div>
			<div class="sk-circle9 sk-child"></div>
			<div class="sk-circle10 sk-child"></div>
			<div class="sk-circle11 sk-child"></div>
			<div class="sk-circle12 sk-child"></div>
		</div>
	</section>

	<?php if (isset($_SESSION['nik'])): ?>
		<div class="user">
			<a href="./logout.php" data-toggle="modal" data-target="#logout" class="btn btn-lg btn-default userLogin">Logout</a>
		</div>
	<?php endif; ?>

	<section id="home">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-2 col-md-8 col-sm-12">
					<div class="home-thumb">
						<?php if (isset($_SESSION['nik'])): ?>
							<h1 class="wow fadeInUp" data-wow-delay="0.6s">SELAMAT DATANG, <?= $_SESSION['nama']; ?></h1>
						<?php else: ?>
							<h1 class="wow fadeInUp" data-wow-delay="0.6s">Portal Pengaduan Masyarakat</h1>
						<?php endif; ?>

						<h3 class="wow fadeInUp" data-wow-delay="0.6s">
							Sampaikan <strong>aspirasi</strong> dan <strong>laporan</strong> Anda demi pelayanan publik yang lebih baik.
						</h3>

						<?php if (isset($_SESSION['nik'])): ?>
							<a href="#contact" class="btn btn-lg btn-default wow fadeInUp hidden-xs" data-wow-delay="0.8s">Buat Laporan</a>
							<a href="lapor.php" class="btn btn-lg btn-default wow fadeInUp hidden-xs" data-wow-delay="0.8s">Lihat Laporan</a>
							<a href="tanggap.php" class="btn btn-lg btn-default wow fadeInUp hidden-xs" data-wow-delay="0.8s">Tanggapan</a>
						<?php else: ?>
							<a href="#" data-toggle="modal" data-target="#login" class="btn btn-lg btn-default wow fadeInUp hidden-xs" data-wow-delay="0.8s">Login</a>
							<a href="#" data-toggle="modal" data-target="#register" class="btn btn-lg btn-default wow fadeInUp hidden-xs" data-wow-delay="0.8s">Register</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<section id="about">
  <div class="about-wrapper">
    <div class="section-title">
      <img src="./images/pengaduan/ewing.png" alt="Logo" class="logo">
      <h4>CEPAT. AMAN. DAN TRANSPARAN.</h4>
      <h1>LAYANAN ASPIRASI &<br>PENGADUAN PUBLIK</h1>
      <p>
        Portal resmi untuk menyalurkan aspirasi dan pengaduan Anda. Kami berkomitmen menghadirkan layanan yang 
        <strong>cepat, aman, dan transparan</strong> agar setiap laporan masyarakat dapat segera ditindaklanjuti 
        bersama instansi terkait.
      </p>
      <div class="action-buttons">
				<a href="#" data-toggle="modal" data-target="#login" class="btn btn-primary">LAPOR SEKARANG</a>
        <a href="./admin/laporan.php" class="btn btn-secondary">Cek Status Laporan</a>
      </div>

      <div class="info">
        <h3>Kenapa Lapor Melalui Kami?</h3>
        <div class="features">
          <div class="feature">
            <i class="fas fa-clock"></i>
            <h5>Cepat</h5>
            <p>Waktu rata-rata penanganan laporan cepat dan efisien.</p>
          </div>
          <div class="feature">
            <i class="fas fa-shield-alt"></i>
            <h5>Aman</h5>
            <p>Data pelapor dijamin kerahasiaannya.</p>
          </div>
          <div class="feature">
            <i class="fas fa-chart-line"></i>
            <h5>Transparan</h5>
            <p>Status laporan dapat dipantau secara terbuka.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="about-thumb">
      <img src="images/tangan-mengepal.jpg" alt="Ilustrasi Pengaduan Masyarakat">
    </div>
  </div>
</section>

	<?php if (isset($_SESSION['nik'])): ?>
	
	<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8 col-sm-12">
        <div class="section-title text-center">
          <h1 class="wow fadeInUp" data-wow-delay="0.3s">Formulir Pengaduan</h1>
          <p class="wow fadeInUp" data-wow-delay="0.6s">
            Sampaikan laporan Anda secara lengkap agar dapat segera kami tindaklanjuti.
          </p>
        </div>

        <div class="contact-form wow fadeInUp" data-wow-delay="0.8s">
          <form id="contact-form" method="post" action="index.php" enctype="multipart/form-data">
            
            <div class="row">
              <div class="col-md-6 col-sm-6 mb-3">
                <label for="kategori">Kategori Laporan</label>
                <select name="kategori" class="form-control" required>
                  <option value="">-- Pilih Kategori Laporan --</option>
                  <option value="Pelayanan Publik">Pelayanan Publik</option>
                  <option value="Infrastruktur">Infrastruktur</option>
                  <option value="Keamanan">Keamanan</option>
                  <option value="Lingkungan">Lingkungan</option>
                  <option value="Sosial">Sosial</option>
                  <option value="Kesehatan">Kesehatan</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>

              <div class="col-md-6 col-sm-6 mb-3">
                <label for="foto">Lampirkan Bukti Foto</label>
                <input name="foto" type="file" class="form-control" accept="image/*" required>
              </div>

              <div class="col-md-12 col-sm-12">
                <label for="isi_laporan">Isi Laporan</label>
                <textarea name="isi_laporan" class="form-control" placeholder="Tuliskan aduan atau laporan Anda di sini..." rows="6" required></textarea>
              </div>

              <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 mt-3">
                <input name="btnMessages" type="submit" class="form-control submit" id="submit" value="KIRIM LAPORAN">
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

	<?php endif; ?>

	<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<svg class="svg" preserveAspectRatio="none" viewBox="0 0 100 102" height="100" width="100%" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 0 L50 100 L100 0 Z"></path>
				</svg>
				<div class="col-md-4 col-sm-6">
					<h2>Portal Pengaduan Masyarakat</h2>
					<p class="text-justify">
						Platform digital untuk menyalurkan aspirasi dan pengaduan masyarakat kepada pemerintah secara mudah dan cepat. Bersama kita wujudkan pemerintahan yang transparan dan responsif.
					</p>
				</div>
				<div class="col-md-1 col-sm-1"></div>
				<div class="col-md-4 col-sm-5">
					<h2>Kontak Kami</h2>
					<p class="wow fadeInUp" data-wow-delay="0.6s">
						UNIVERSITAS PAMULANG<br>
						Kota Tangerang Selatan, Banten 15323
					</p>
					<ul class="social-icon">
						<li><a href="#" class="fa fa-instagram wow bounceIn" data-wow-delay="0.9s"></a></li>
						<li><a href="#" class="fa fa-whatsapp wow bounceIn" data-wow-delay="1.2s"></a></li>
						<li><a href="#" class="fa fa-facebook wow bounceIn" data-wow-delay="1.4s"></a></li>
					</ul>
					<p class="copyright-text">© M. Faisal, Fathir. M, Fikri. F | All Rights Reserved</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- Modal Login -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
					<h2 class="modal-title" style="color: black;">Login Masyarakat</h2>
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<input name="usernameLogin" type="text" class="form-control" placeholder="Username" required>
					<input name="passwordLogin" type="password" class="form-control" placeholder="Password" required>
					<input name="loginBtn" type="submit" class="btn btn-block" value="Login">
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Register -->
	<div class="modal fade" id="register" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
					<h2 class="modal-title" style="color: black;">Daftar Akun</h2>
				</div>
				<form action="index.php" method="post">
					<input name="nikRegister" type="text" class="form-control" placeholder="NIK" maxlength="16" required>
					<input name="namaRegister" type="text" class="form-control" placeholder="Nama Lengkap" required>
					<input name="usernameRegister" type="text" class="form-control" placeholder="Username" required>
					<div class="row">
						<div class="col-sm-6">
							<input name="passwordRegister" type="password" class="form-control" placeholder="Password" required>
						</div>
						<div class="col-sm-6">
							<input name="confirm_passwordRegister" type="password" class="form-control" placeholder="Konfirmasi Password" required>
						</div>
					</div>
					<input name="telpRegister" type="text" class="form-control" placeholder="Nomor Telepon" maxlength="13" required>
					<input name="registerBtn" type="submit" class="btn btn-block" value="Daftar">
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Logout -->
	<div class="modal fade" id="logout" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
					<h2 class="modal-title">Yakin ingin keluar?</h2>
				</div>
				<form action="#" method="post">
					<a class="btn btn-default" href="logout.php">Ya</a>
					<a class="btn btn-default" href="#" data-dismiss="modal">Tidak</a>
				</form>
			</div>
		</div>
	</div>

	<!-- Back to Top -->
	<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>

	<!-- Scripts -->
	<script src="assets/public/js/jquery.js"></script>
	<script src="assets/public/js/bootstrap.min.js"></script>
	<script src="assets/public/js/vegas.min.js"></script>
	<script src="assets/public/js/wow.min.js"></script>
	<script src="assets/public/js/smoothscroll.js"></script>
	<script src="assets/public/js/custom.js"></script>

</body>
</html>
