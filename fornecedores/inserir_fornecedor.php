<?php

// Recebendo o método POST
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$cnpj = $_POST["cnpj"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$endereco = $_POST["endereco"];
$status = $_POST["status"];

// Inserindo no banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

$sql = $pdo->prepare("INSERT INTO fornecedores (nome, telefone, email, cnpj, cidade, estado, endereco, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$sql->execute([$nome, $telefone, $email, $cnpj, $cidade, $estado, $endereco, $status]);

header("Location: ../fornecedores/action_fornecedor.php");
exit;
