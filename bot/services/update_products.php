<?php
  session_start();
  require_once('../database/connection.php');
  error_reporting(0);
  ini_set("display_errors", 0 );

  $gas = $_POST['gas'];
  $agua = $_POST['agua'];

  $email = $_SESSION['email'];

  $emailExistsResult = $pdo
  ->query("SELECT email from login WHERE email = '$email'")
  ->rowCount();

  if($emailExistsResult == 1) {
    $updateSQL = $pdo->query("UPDATE login SET 
      prod_gas = '$gas',
      prod_agua = '$agua' WHERE email='$email'")->execute();

    if(!$updateSQL) {
      echo '<script>alert("Unable to update values.")</script>';
      echo '<script>alert("Try Again!"")</script>';
      echo '<script>history.back();</script>';
    } else {
      echo '<script>alert("Values ​​updated successfully.")</script>';
      echo "<meta http-equiv='refresh' content='0;url=/pages/views/produtos.php'>";
    }
  } else {
    echo '<script>alert("Authentication error. Email not found.")</script>';
    echo "<meta http-equiv='refresh' content='0;url=/pages/views/produtos.php'>";
  }
?>