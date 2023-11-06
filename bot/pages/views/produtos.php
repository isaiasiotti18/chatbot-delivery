<?php

  require("../../services/check_session.php");

  require $_SERVER['DOCUMENT_ROOT'].'/database/connection.php';

  $email = $_SESSION['email'];

  $emailExistsResult = $pdo
    ->query("SELECT prod_agua, prod_gas from login WHERE email = '$email'")
    ->fetch(PDO::FETCH_ASSOC);

  $gas = $emailExistsResult['prod_gas'];
  $agua = $emailExistsResult['prod_agua'];

  $adm = 0;

?>

<?php include("../partials/header.php") ?>
    <section id="home">
      <div align='center'>
        <form id="form1" name="form1" method="post" action="../../services/update_products.php">
          <table>
            <tr>
              <th>Produtos</th>
              <th>Valores</th>
            </tr>
            <tr>
              <td>Botijão Gás</td>
              <td><br>
                <input type="number" value='<?php echo "$gas";?>' name="gas" id="gas" min="0.00" step="1.99" min="0" max="9999.99" lang="pt-BR" />
              </td>
            </tr>
            <tr>
              <td>Galão de Água</td>
              <td><br>
                <input type="number" value='<?php echo "$agua";?>' name="agua" id="agua" step="1.99" min="0" max="9999.99" lang="pt-BR" />

              </td>
            </tr>
            <tr>
              <td colspan="2">
                <input type="submit" name="button" id="button" value="Salvar" />
              </td>
            </tr>
          </table>
        </form>
      </div>
    </section>
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

  table {
    width: 100%;
  }

  th,
  td {
    padding: 10px;
    text-align: left;
  }

  th {
    background-color: #eee;
  }

  input[type="text"] {
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