<?php
  require("../../services/check_session.php");
  include("../partials/header.php");
  $adm = 0;
?>
    <section id="home">
      <form>
        <h1>Detalhes da venda</h1>
        <table>
          <tr>
            <td>Produto:</td>
            <td>Produto A</td>
          </tr>
          <tr>
            <td>Data:</td>
            <td>01/01/2022</td>
          </tr>
          <tr>
            <td>Hora:</td>
            <td>14:30</td>
          </tr>
          <tr>
            <td>Valor:</td>
            <td>R$ 50,00</td>
          </tr>
        </table>
      </form>
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

  h1 {
    margin-bottom: 10px;
  }

  table {
    width: 100%;
    margin-top: 10px;
    border-collapse: collapse;
  }

  th,
  td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #eee;
  }

  td:first-child {
    font-weight: bold;
  }
</style>