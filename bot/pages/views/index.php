<?php
  require("../../services/check_session.php");
  include("../partials/header.php");
  $adm = 0;
?>
    <section id="home">
      <?php include("../partials/area_vendas.php"); ?>
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

  .venda {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    max-width: 500px;
    margin: 0 auto;
    margin-bottom: 15px;
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