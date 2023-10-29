<?php

$id = $_GET["id"];

$pdo = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

$sql = $pdo->prepare("DELETE FROM cliente WHERE id = :id");

$sql->bindParam(':id', $id);

$sql->execute();

header("Location: ../clientes/action_cliente.php");
exit;