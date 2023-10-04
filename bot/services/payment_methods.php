<?php

  session_start();

  require '../database/connection.php';

  $dinheiro = isset($_POST['dinheiro']);
  $pix = isset($_POST['pix']);
  $cartao = isset($_POST['cartao']);
  $caderneta = isset($_POST['caderneta']);

  $dinheiro ? $dinheiro = 1 : $dinheiro = 0;
  $pix ? $pix = 1 : $pix = 0;
  $cartao ? $cartao = 1 : $cartao = 0;
  $caderneta ? $caderneta = 1 : $caderneta = 0;
  

  $email = $_SESSION['email'];

  $emailExistsResult = $pdo
    ->query("SELECT email from login WHERE email = '$email'")
    ->rowCount();

  if($emailExistsResult == 1) {
    $updateSQL = $pdo->query("UPDATE login SET 
      dinheiro = '$dinheiro',
      pix = '$pix',
      cartao = '$cartao',
      caderneta = '$caderneta' WHERE email = '$email'")->execute();

    if(!$updateSQL) {
      echo '<script>alert("Payment methods cannot be updated.")</script>';
      echo '<script>alert("Try Again!"")</script>';
      echo '<script>history.back();</script>';
    } else {
      echo '<script>alert("Payment methods updated successfully.")</script>';
      echo "<meta http-equiv='refresh' content='0;url=/pages/views/config.php'>";
    }
  }

?>