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
    <meta charset="utf-8">
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
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="tips.html" class="nav-item nav-link active">Tips & Trick</a>
                    <a href="video.html" class="nav-item nav-link">Video Tutorial</a>
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


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Tips & Trick</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="index.html">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Tips & Trick</p>
            </div>
            <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Category</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="beasiswa-nasional.html">Beasiswa Nasional</a>
                            <a class="dropdown-item" href="beasiswa-internasional.html">Beasiswa Internasional</a>
                            <!--a class="dropdown-item" href="#">Courses 3</a-->
                        </div>
                    </div>
                    <input type="text" class="form-control border-light" style="padding: 30px 25px;" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="btn btn-secondary px-4 px-lg-5">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


	<div class="container col-md-6 mt-4">
		<h1>TABEL TIPS & TRIK</h1>
        <fieldset>
        <legend>Form Upload</legend>
        <form method="post" enctype="multipart/form-data" action="proses.php">
            <div class="form-group">
                <label for="exampleInputFile">File Upload</label>
                <input type="file" name="berkas_excel" class="form-control" id="exampleInputFile">
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
        </form>
        </fieldset>
        <br/>
		<div class="card">
			<div class="card-header bg-success text-white ">
				TIPS & TRIK MENGENAI BEASISWA <a href="tambah.php" class="btn btn-sm btn-primary float-right">Tambah</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal Upload</th>
							<th>Judul</th>
							<th>Deskripsi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include('koneksi.php'); //memanggil file koneksi
							$datas = mysqli_query($koneksi, "select * from tipsntrik") or die(mysqli_error($koneksi));
							//script untuk menampilkan data tipsntrik

							$no = 1;//untuk pengurutan nomor

							//melakukan perulangan
							while($row = mysqli_fetch_assoc($datas)) {
						?>	

					<tr>
						<td><?= $no; ?></td>
						<td><?= $row['tanggal_upload'];  ?></td>
						<td><?= $row['judul']; ?></td>
						<td><?= $row['deskripsi']; ?></td>
						<td>
								<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
								<a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
						</td>
					</tr>

						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>