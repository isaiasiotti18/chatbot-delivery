<?php
  require '../../database/connection.php';

  $email = $_SESSION['email'];

  $emailExistsResult = $pdo
  ->query("SELECT email from login WHERE email = '$email'")
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
    INNER JOIN pedido p ON p.id = cp.id_pedido")->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo '<script>alert("Erro inesperado.")</script>';
    echo "<meta http-equiv='refresh' content='0;url=/pages/views/index.php'>";
    exit;
  }

?>

<?php foreach($pedidos as $pedido) { ?>

<div id="divform" align='center'>

  <form id="form1" name="form1" method="post" action="">
    <table width="80%" border="0">
      <tr>
        <td colspan="2">
          <div align="center">
            <H1>NOVO PEDIDO</H1>
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
      <tr>
        <td><br>
          <div align="center">GÁS</div>
        </td>
        <td>
          <div align="center"><?php echo $pedido['qtd_gas']; ?></div>
        </td>
      </tr>
      <tr>
        <td><br>
          <div align="center">ÁGUA</div>
        </td>
        <td>
          <div align="center"><?php echo $pedido['qtd_agua'] ?></div>
        </td>
      </tr>
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
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
          <label>
            <div align="center">
              <input class="aceitar-btn" type="submit" name="button" value="ACEITAR" formaction="aceitar.php" />
            </div>
          </label>
        </td>
        <td>
          <label>
            <div align="center">
              <input class="recusar-btn" type="submit" name="button" value="RECUSAR" formaction="recusar.php" />
            </div>
          </label>
        </td>
      </tr>
    </table>
  </form>

</div>

<?php } ?>