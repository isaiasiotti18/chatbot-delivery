<?php
  session_start();

  require $_SERVER['DOCUMENT_ROOT'] . '/database/connection.php';

  $email = $_SESSION['email'];

  $pedido_id = $_POST['id_pedido'];

  $emailExistsResult = $pdo
  ->query("SELECT email from login WHERE email = '$email'")
  ->rowCount();

  if($emailExistsResult = 1) {
    $updateStatusPedido = $pdo->query("
      UPDATE pedido 
        SET status_pedido = 'aceito' WHERE id = $pedido_id")->execute();
    
    if($updateStatusPedido) {
      echo '<script>alert("Order accepted successfully.")</script>';
      echo "<meta http-equiv='refresh' content='0;url=/pages/views/pedidos.php'>";
    } else {
      echo "<script>alert('The order $pedido_id could not be accepted.')</script>";
      echo '<script>history.back();</script>';
      exit;
    }
  }

?>