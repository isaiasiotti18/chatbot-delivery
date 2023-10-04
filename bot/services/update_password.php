<?php
  session_start();

  require '../database/connection.php';

  $email = $_SESSION['email'];

  $existsResult = $pdo->query("SELECT email, senha FROM `login` WHERE email = '$email'")->rowCount();

  if ($existsResult == 1) {
    $senha = $_POST['senha'];

    $updateSQL = $pdo->query("UPDATE login SET senha = '$senha' WHERE email = '$email'")->execute();

    if(!$updateSQL) {
      echo '<script>alert("Your password could not be updated.")</script>';
      echo '<script>alert("Try Again!"")</script>';
      echo '<script>history.back();</script>';
      exit;
    } else {
      echo '<script>alert("Password updated successfully.")</script>';
      echo "<meta http-equiv='refresh' content='0;url=/pages/views/config.php'>";
    }
  }


?>