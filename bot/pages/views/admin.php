<?php
  require("../../services/check_session.php");

  
  $adm = 0;

  if($_SESSION['tipo'] == 0) {
    echo '<script>alert("You are not authorized to access this page.")</script>';
    echo "<meta http-equiv='refresh' content='0;url=/pages/views/index.php'>";
    exit;
  }

  require $_SERVER['DOCUMENT_ROOT'] . '/database/connection.php';

  $email = $_SESSION['email'];

  $nome_usuario = $_GET['nome_usuario'];

  $emailExistsResult = $pdo
    ->query("SELECT email from login WHERE email = '$email'")
    ->rowCount();

  if($emailExistsResult = 1) {
    $userResult = $pdo
      ->query("SELECT id, nome, email, status, tipo FROM `login` WHERE nome LIKE '%$nome_usuario%' AND `tipo` = 0")
      ->fetchAll(PDO::FETCH_ASSOC);
  }

?>

    <!-- AQUI VAI O MENU -->
    <?php include("../partials/header.php") ?>
    <br><br><br>

    <!-- Buscar usuário -->
    <form method="get" action="./admin.php">
      <h1>Buscar Usuário(s)</h1>

      <br>
      
      <label for="nome_usuario">Nome Usuário</label>
      <input type="text" id="nome_usuario" name="nome_usuario">
      
      <br><br>
      
      <input type="submit" value="Filtrar">
    </form>

    <br>

    <!-- Formulário de habilitar e desabilitar -->
    
    <?php foreach($userResult as $user) { ?>

      <form method="post" action="../../services/enableDisabled_user.php">
        <h2>Código de identificação: <?php echo $user['id']; ?></h2>
        <br>
        <p>Nome: <?php echo $user['nome']; ?></p>
        <p>Email: <?php echo $user['email']; ?></p>
        <p>Status: <?php $user['status'] ? print "<span id='ativo'>ativo</span>" : print "<span id='desativado'>desativado</span>"; ?></p>
        
        <br>

        <hr align="center" width="100%" size="3" color="black">

        <br>
        
        <?php if($user['status'] == 1) { ?> 
          <label>
            <input type="radio" name="status" value="1" checked> Ativar
          </label>

          <label>
            <input type="radio" name="status" value="0"> Desativar
          </label>
        <?php } else { ?>
          <label>
            <input type="radio" name="status" value="1"> Ativar
          </label>

          <label>
            <input type="radio" name="status" value="0" checked> Desativar
          </label>
        <?php } ?>

        <input name="usuario_id" type="hidden" value="<?php echo $user['id']; ?>">

        <input type="submit" value="Salvar">
      </form>

      <br><br>
    <?php } ?>

    <script>
      function verificaSenhas() {
        var senha = document.getElementById("senha").value;
        var confirmar_senha = document.getElementById("confirmar_senha").value;

        if (senha != confirmar_senha) {
          alert("As senhas não são iguais!");
          return false;
        }

        return true;
      }
    </script>
    <script src="../../js/fastclick.js"></script>
    <script src="../../js/scroll.js"></script>
    <script src="../../js/fixed-responsive-nav.js"></script>
  </body>
</html>

<style>
    body {
      font-family: sans-serif;
    }

    .container {
      width: 80%;
      margin: 0 auto;
    }

    /* Mobile first queries */
    @media (max-width: 600px) {
      .container {
        width: 100%;
      }
    }


    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      max-width: 500px;
      margin: 0 auto;
    }

    #desativado {
      color: #F51403;
      font-weight: 700;
    }

    #ativo {
      font-weight: 700;
    }

    #nome_usuario {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 75%;
      margin-top: 5px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="password"] {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 100%;
      margin-top: 5px;
    }

    input[type="submit"] {
      padding: 10px;
      background-color: #4CAF50;
      border: none;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
      width: 45%;
      font-size: medium;
      font-weight: 600;
    }

    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>