<?php
require("../../services/check_session.php");

$adm = 0;

?>

<?php include("../partials/header.php") ?>

  <section>
    <?php include("../partials/pedido.php") ?>
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
    margin: 10px auto;
  }

  #divform {
    margin-top: 25px;
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

  tr:nth-child(odd) {
    background-color: #f2f2f2;
  }

  tr:nth-child(even) {
    background-color: #d9d9d9;
  }

  input[type="text"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
    margin-top: 5px;
  }

  .aceitar-btn {
    padding: 10px;
    background-color: #4CAF50;
    border: none;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
  }

  .aceitar-btn:hover {
    padding: 10px;
    background-color: #3e8e41;
    border: none;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
  }

  .recusar-btn {
    padding: 10px;
    background-color: #BB2525;
    border: none;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
  }

  .recusar-btn:hover {
    padding: 10px;
    background-color: #FF6969;
    border: none;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
  }

</style>