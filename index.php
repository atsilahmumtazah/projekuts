<?php
  session_start();
  include "config.php";

  if (!isset($_SESSION["login"])) {
    header ("Location: /myloginform/login.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyLoginForm</title>

  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <main class="main-wrap">
    <div class="main-inner">
      <div class="main-content">
        <div class="main-title">
          <?php
            if (isset($_SESSION["name"])) {
              echo "<h2 class='title'>Hi, selamat datang ". $_SESSION["name"] ."</h2>";
            }
          ?>
        </div>
        
        <div class="main-logout">
          <a href="index_user.php">Lanjut</a>
		  <a href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </main>
</body>
</html>