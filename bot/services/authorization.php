<?php


require $_SERVER['DOCUMENT_ROOT'] . '/database/connection.php';

$email = $_SESSION['email'];

if (empty($email) or is_null($email)) {
  echo '<script>alert("You are not authorized to access this page.")</script>';
  echo "<meta http-equiv='refresh' content='0;url=/pages/views/login.php'>";
  exit;
} else if ($_SESSION['email'] == True) {
  $emailExistsSQL = "SELECT email, senha, nome, tipo from login WHERE email = '$email'";
  $emailExistsResult = $pdo->query($emailExistsSQL);
  while ($dados = $emailExistsResult->fetch()) {
    $email = $dados['email'];
    $senha = $dados['senha'];
    $nome = $dados['nome'];
    $tipo = $dados['tipo'];
  }
}

$_SESSION['tipo'] = $tipo;

?>