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
      p.valor,
      p.status_pedido,
      p.forma_pagamento,
      p.data_hora
    FROM cliente_pedido cp
    INNER JOIN cliente c ON c.id = cp.id_cliente
    INNER JOIN pedido p ON p.id = cp.id_pedido
    WHERE status_pedido = 'concluido'")->fetchAll(PDO::FETCH_ASSOC);

  } else {
    echo '<script>alert("Erro inesperado.")</script>';
    echo "<meta http-equiv='refresh' content='0;url=/pages/views/index.php'>";
    exit;
  }

?>

<?php foreach($pedidos as $pedido) { ?>

<div class="venda">

  <h1>Detalhes da venda</h1>
  <?php echo $data =date('d/m/Y H:i:s', strtotime($pedido['data_hora'])); ?>
  <h4>Pedido: #<?php echo $pedido['id_pedido']; ?></h4>
  <table>

    <?php if($pedido['qtd_gas'] >= 1) { ?>
      <tr>
        <td>Gas Quantidade:</td>
        <td><?php echo $pedido['qtd_gas'] ?></td>
      </tr>
    <?php } ?>

    <?php if($pedido['qtd_agua'] >= 1) { ?>
      <tr>
        <td>Agua Quantidade:</td>
        <td><?php echo $pedido['qtd_agua'] ?></td>
      </tr>
    <?php } ?>

    <tr>
      <td>Valor:</td>
      <td>R$ <?php echo $pedido['valor']; ?> </td>
    </tr>

  </table>
</div>

<?php } ?>