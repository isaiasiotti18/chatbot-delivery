<?php
require('../database/connection.php');

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];

$emailExistsSQL = "SELECT email from login WHERE email = '$email'";

$emailExistsResult = $pdo->query($emailExistsSQL)->rowCount();

if ($emailExistsResult > 0) {
  echo '<script>alert("Email Already Exists...")</script>';
  echo '<script>history.back();</script>';
  exit;
} else {
  $insertSQL = "INSERT INTO `login` (`id`, `email`, `senha`, `nome`, `tipo`)
    VALUES (NULL, '$email', '$senha', '$nome', '0');";

  $pdo->exec($insertSQL);


  echo "<meta http-equiv='refresh' content='0;url=/pages/views/confirmar-email.php'>";


  exit();
}

  $pdo = null;
?>