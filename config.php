<?php
  $hostname = 'localhost';
  $username = 'root';
  $password = '';
  $dbname   = 'db_login';

  $conn = mysqli_connect($hostname, $username, $password, $dbname);

  if (!$conn) {
    die ("<script>alert('Gagal terhubung dengan database.')</script>");
  }
?>