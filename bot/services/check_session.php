<?php

session_start();

if($_SESSION['email'] == false and $_SESSION['senha'] == false) {
  echo '<script>alert("You are not authorized to access this page.")</script>';
  echo "<meta http-equiv='refresh' content='0;url=/pages/views/login.php'>";
  exit;
}

?>