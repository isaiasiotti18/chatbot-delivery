<?php
require("../../services/check_session.php");

require $_SERVER['DOCUMENT_ROOT'] . '/database/connection.php';

$email = $_SESSION['email'];

$emailExistsResult = $pdo
  ->query("SELECT dinheiro, pix, cartao, caderneta from login WHERE email = '$email'")
  ->fetch(PDO::FETCH_ASSOC);

$dinheiro = $emailExistsResult['dinheiro'];
$pix = $emailExistsResult['pix'];
$cartao = $emailExistsResult['cartao'];
$caderneta = $emailExistsResult['caderneta'];

$adm = 0;

?>

<?php include("../partials/header.php") ?>

    <section id="home">
      <form method="post" action="../../services/update_password.php" onsubmit="return verificaSenhas()">
        <h1>Adicionar nova senha</h1>
        <label for="senha">Nova senha:</label>
        <input type="password" id="senha" name="senha" required>
        <label for="confirmar_senha">Confirmar senha:</label>
        <input type="password" id="confirmar_senha" name="confirmar_senha" required>
        <input type="submit" value="Adicionar senha">
      </form>
      <br>
      <form method="post" action="../../services/payment_methods.php">
        <h2>Formas de pagamento</h2>
        <p>Selecione as opções de pagamento disponíveis:</p>
        <input type="checkbox" id="dinheiro" name="dinheiro" <?php if ($dinheiro == True) {
                                                                echo 'checked';
                                                              } ?>>
        <label for="dinheiro">Dinheiro</label><br>
        <input type="checkbox" id="pix" name="pix" <?php if ($pix == True) {
                                                      echo 'checked';
                                                    } ?>>
        <label for="pix">PIX</label><br>
        <input type="checkbox" id="cartao" name="cartao" <?php if ($cartao == True) {
                                                            echo 'checked';
                                                          } ?>>
        <label for="cartao">Cartão</label><br>
        <input type="checkbox" id="caderneta" name="caderneta" <?php if ($caderneta == True) {
                                                                  echo 'checked';
                                                                } ?>>
        <label for="caderneta">Caderneta</label><br>
        <br>
        <input type="submit" value="Salvar">
      </form>
    </section>
  </body>
</html>

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

  <script src="js/fastclick.js"></script>
  <script src="js/scroll.js"></script>
  <script src="js/fixed-responsive-nav.js"></script>
  </body>

  </html>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      max-width: 500px;
      margin: 0 auto;
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
    }

    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>