<?php
session_start();

require '../database/connection.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$existsSQL = "SELECT email, senha FROM `login` WHERE email = '$email' AND senha = '$senha';";

$existsResult = $pdo->query($existsSQL)->rowCount();

if ($existsResult == 1) {

  $_SESSION['email'] = $email;
  $_SESSION['senha'] = $senha;

  echo "<meta http-equiv='refresh' content='0;url=/pages/views/index.php'>";
} else {
  echo '<script>alert("Incorrect email or password.")</script>';
  echo '<script>history.back();</script>';
  exit;
}
