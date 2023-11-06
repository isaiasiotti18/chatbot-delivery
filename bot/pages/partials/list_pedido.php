<?php
  require '../../database/connection.php';

  $email = $_SESSION['email'];

  $emailExistsResult = $pdo
  ->query("SELECT email, prod_agua, prod_gas from login WHERE email = '$email'")
  ->rowCount();

  if($emailExistsResult = 1) {
    $pedidos = $pdo->query("SELECT 
      cp.id_cliente,
      cp.id_pedido,
      c.nome, 
      c.cep, 
      c.endereco, 
      c.telefone, 
      c.email,
      p.qtd_gas,
      p.qtd_agua,
      p.status_pedido,
      p.forma_pagamento,
      p.data_hora
    FROM cliente_pedido cp
    INNER JOIN cliente c ON c.id = cp.id_cliente
    INNER JOIN pedido p ON p.id = cp.id_pedido
    ")->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<script>alert("Erro inesperado.")</script>';
    echo "<meta http-equiv='refresh' content='0;url=/pages/views/index.php'>";
    exit;
  }

?>

<div class="vertical-menu">
  <a href="#">Recebidos</a>
  <a href="#">Aceitos</a>
  <a href="#">Despachados</a>
  <a href="#">Concluídos</a>
  <a href="#">Cancelados</a>
</div>

<?php foreach($pedidos as $pedido) { ?>

<div id="divform" align='center'>

  <form id="form1" name="form1" method="post" action="">
    <table width="80%" border="0">
      <tr>
        <td colspan="2">
          <div align="center">
            <H1>NOVO PEDIDO: #<?php echo $pedido['id_pedido']; ?></H1>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div align="center">
            <h4>Status Pedido: <?php echo $pedido['status_pedido']; ?></h4>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div align="center"><b>PRODUTO</b></div>
        </td>
        <td>
          <div align="center"><b>QUANTIDADE</b></div>
        </td>
      </tr>

      <?php if($pedido['qtd_gas'] >= 1) { ?>
      <tr>
        <td><br>
          <div align="center">GÁS</div>
        </td>
        <td>
          <div align="center"><?php echo $pedido['qtd_gas']; ?></div>
        </td>
      </tr>
      <?php } ?>

      <?php if($pedido['qtd_agua'] >= 1) { ?>
      <tr>
        <td><br>
          <div align="center">ÁGUA</div>
        </td>
        <td>
          <div align="center"><?php echo $pedido['qtd_agua'] ?></div>
        </td>
      </tr>
      <?php } ?>

      <tr>
        <td colspan="2">
          <div align="center"><b>CLIENTE:</b></div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div align="center"><?php echo $pedido['telefone'] ?> - <?php echo $pedido['nome'] ?></div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div align="center"><b>ENDEREÇO<b></div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div align="center"><?php echo $pedido['cep'] ?> - <?php echo $pedido['endereco'] ?></div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div align="center"><b>FORMA DE PAGAMENTO<b></div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div align="center"><?php echo $pedido['forma_pagamento'] ?></div>
        </td>
      </tr>
      <tr>
        <td>
          <label>
            <div align="center">
              <input class="aceitar-btn" type="submit" name="aceitar" value="ACEITAR" formaction="../views/pedido/aceitar_pedido.php" />
            </div>
          </label>
        </td>
        <td>
          <label>
            <div align="center">
              <input class="recusar-btn" type="submit" name="recusar" value="RECUSAR" formaction="../views/pedido/recusar_pedido.php" />
            </div>
          </label>
        </td>
      </tr>
    </table>

    <input type="hidden" name="id_pedido" value="<?php echo $pedido['id_pedido']; ?>">
  </form>

</div>

<br>
<br>

<?php } ?>

<style>

.vertical-menu {
  width: 200px; /* Set a width if you like */
  position: fixed;
}

.vertical-menu a {
  background-color: #eee; /* Grey background color */
  color: black; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
  background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
  background-color: #04AA6D; /* Add a green color to the "active/current" link */
  color: white;
}

</style>