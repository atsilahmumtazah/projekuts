<?php
  session_start();
  include "config.php";

  if (!isset($_SESSION["login"])) {
    header ("Location: /myloginform/login.php");
    exit;
  }
?>
<!DOCTYPE html>
<html>

<head>
	<title>TIPS & TRIK</title>
	<!-- Favicon -->
	<link href="img/logo.png" rel="icon">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

	<!-- Font Awesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="css/style.css" rel="stylesheet">
	</head>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand ml-lg-3">
                <img src="img/logo-croped.png"/>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="" class="nav-item nav-link">About</a>
                    <a href="indexcrud.php" class="nav-item nav-link">Tips & Trick</a>
                    <a href="" class="nav-item nav-link">Video Tutorial</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                        <div class="dropdown-menu m-0">
                            <a href="beasiswa-nasional.html" class="dropdown-item">Beasiswa Nasional</a>
                            <a href="beasiswa-internasional.html" class="dropdown-item">Beasiswa Internasional</a>
                            <!----
                            <a href="team.html" class="dropdown-item">Instructors</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            -->
                        </div>
                    </div>
                    <!--a href="contact.html" class="nav-item nav-link">Contact</a-->
                </div>
                <div class="main-title">
                    <?php
                      if (isset($_SESSION["name"])) {
                        echo "<h4 class='title'>Hi, selamat datang ". $_SESSION["name"] ."</h4>";
                      }
                    ?>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

	<div class="container col-md-6 mt-4">
		<h1>Tambah Data Tips & Trik</h1>
		<div class="card">
			<div class="card-header bg-success text-white">
				Tambah Data
			</div>
			<div class="card-body">
				<form action="" method="post" role="form">
					<div class="form-group">
						<label>Tanggal Upload</label>
						<input type="text" name="tanggal_upload" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>Judul</label>
						<input type="text" name="judul" class="form-control">
					</div>

					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" name="deskripsi"></textarea>
					</div>

					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
				</form>

				<?php
				include('koneksi.php');
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$tanggal_upload = $_POST['tanggal_upload'];
					$judul = $_POST['judul'];
					$deskripsi = $_POST['deskripsi'];

					//query untuk menambahkan data ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($koneksi, "insert into tipsntrik (tanggal_upload,judul,deskripsi)values('$tanggal_upload', '$judul', '$deskripsi')") or die(mysqli_error($koneksi));
					//id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='indexcrud.php';</script>";
				}
				?>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>