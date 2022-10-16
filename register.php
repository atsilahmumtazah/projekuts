<?php
  session_start();
  include "config.php";

  if (isset($_SESSION["login"])) {
    header("Location: /myloginform/index.php");
  }

  if (isset($_POST["submit"])) {
    global $conn;

    $username    = strtolower(stripslashes($_POST["username"]));
    $password    = mysqli_real_escape_string($conn, $_POST["password"]);
    $password_en = password_hash($password, PASSWORD_DEFAULT);

    $username_check = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");

    if (mysqli_fetch_assoc($username_check)) $username_err = "Username sudah digunakan.";

    if (!isset($_POST["terms"])) $terms_err = "Klik centang pada syarat & ketentuan pendaftaran.";

    if (!empty($username) && !empty($password) && isset($_POST["terms"]) && !mysqli_fetch_assoc($username_check)) {
      $result = mysqli_query($conn, "INSERT INTO tb_admin VALUES('', '$username', '$password_en')");
    }

    if (isset($result)) header("Location: /myloginform/login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

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

  <link rel="stylesheet" href="./style.css">
</head>
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
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="tips.html" class="nav-item nav-link">Tips & Trick</a>
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
                <a href="index.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">Login</a>
                <a href="register.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">Register</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
  <main class="main-wrap">
    <div class="main-inner">
      <div class="form-box">
        <div class="form-title">
          <h2 class="title">Register</h2>
        </div>
  
        <form action="" method='POST'>
          <input type="text" name="username" id="username" placeholder='Username' required>
  
          <input type="password" name="password" id="password" placeholder='Isi password minimal 6 karakter' pattern='.{6,}' required>
  
          <div class="form-group">
            <input type="checkbox" name="terms" id='terms'>
            <label for="terms">Syarat & Ketentuan</label>
          </div>
  
          <button type="submit" name='submit'>Daftar</button>

          <?php global $username_err; if(!empty($username_err)) echo "<div class='text-error'>* ". $username_err ."</div>" ?>
          <?php global $terms_err; if(!empty($terms_err)) echo "<div class='text-error'>* ". $terms_err ."</div>" ?>
  
          <div class="form-text">
            <span>Sudah punya akun? <a href="login.php">Login</a>.</span>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>
</html>