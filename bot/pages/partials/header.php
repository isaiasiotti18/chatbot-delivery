<?php require $_SERVER['DOCUMENT_ROOT'].'/services/authorization.php'; ?>

<!DOCTYPE html>
<html lang="pt">
  <head>

    <title>DELIVERY</title>
    <meta charset="utf-8">


    <meta name="author" content="Adtile">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../../css/styles.css">

    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link rel="stylesheet" href="css/ie.css">
      <![endif]-->
    <script src="../../js/responsive-nav.js"></script>
    <link rel="stylesheet" href="../../style.css">
  </head>

  <body>
    <header>
      <a href="index.php" class="logo" data-scroll>DELIVERY</a>
      <nav class="nav-collapse">
        <ul>
          <li class="menu-item"><a href="../views/index.php" data-scroll>VENDAS</a></li>
          <li class="menu-item"><a href="../views/produtos.php" data-scroll>PRODUTOS</a></li>
          <li class="menu-item"><a href="../views/pedidos.php" data-scroll>PEDIDOS</a></li>
          <li class="menu-item"><a href="../views/config.php" data-scroll>CONFIGURAÇÕES</a></li>

          <?php
            if ($tipo == 1) {
          ?>
          <li class="menu-item"><a href="../views/admin.php" data-scroll>ADMIN</a></li>

          <?php
          }
          ?>
          <li class="menu-item"><a href="../views/sair.php" data-scroll>SAIR</a></li>

        </ul>
      </nav>
    </header>