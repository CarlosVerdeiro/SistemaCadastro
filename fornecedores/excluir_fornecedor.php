<?php

$id = $_GET["id"];

$pdo = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

$sql = $pdo->prepare("DELETE FROM fornecedores WHERE id = :id");

$sql->bindParam(':id', $id);

$sql->execute();

header("Location: ../fornecedores/action_fornecedor.php");
exit;