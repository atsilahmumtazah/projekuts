<?php
  session_start();
  include "config.php";

  if (isset($_SESSION["login"])) {
    header("Location: /myloginform/index.php");
  }

  if (isset($_POST["login"])) {
    global $conn;

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      
      if (password_verify($password, $row["password"])) {
        $_SESSION["login"] = true;
        $_SESSION["name"]  = $username;
        
        header("Location: /myloginform/index.php");
      } else {
        $login_err = "Password yang kamu masukkan salah.";
      }
    } else {
      $login_err = "Username yang kamu masukkan salah.";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

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
          <h2 class="title">Login</h2>
        </div>
  
        <form action="" method='POST'>
          <?php global $login_err; if(!empty($login_err)) echo "<div class='form-error'>". $login_err ."</div>" ?>

          <input type="text" name="username" id="username" placeholder='Username' required>
  
          <input type="password" name="password" id="password" placeholder='Minimal 6 karakter' pattern='.{6,}'>
  
          <button type="submit" name='login'>Masuk</button>
  
          <div class="form-text">
            <span>Belum punya akun? <a href="register.php">Daftar</a>.</span>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>
</html>