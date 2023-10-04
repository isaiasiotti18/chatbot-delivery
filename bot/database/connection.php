<?php

$servidor = '10.5.0.3';
$usuario = 'root';
$senha = 'isaiasiotti';
$database = 'db_chatbot_delivery';

try {
  $pdo = new PDO("mysql:host=$servidor;dbname=$database", "root", $senha);
} catch (PDOException $e) {
  echo $e->getMessage() . "\n";
  echo ((int)$e->getCode() . "\n");
}

?>