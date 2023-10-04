<?php
  session_start();

  require("../database/connection.php");
  
  $email = $_SESSION['email'];

  $emailExistsResult = $pdo
    ->query("SELECT email from login WHERE email = '$email'")
    ->rowCount();

  if($emailExistsResult = 1) {

    $status = $_POST['status'];
    $usuario_id = $_POST['usuario_id'];

    $sqlUpdateStatus = $pdo
      ->query("UPDATE login SET status = $status WHERE id = '$usuario_id'")
      ->execute();

    if($sqlUpdateStatus) {
      echo '<script>alert("Status updated successfully.")</script>';
      echo "<meta http-equiv='refresh' content='0;url=/pages/views/admin.php'>";
    } else {
      echo '<script>alert("Status could not be updated.")</script>';
      echo '<script>history.back();</script>';
    }

  }

?>