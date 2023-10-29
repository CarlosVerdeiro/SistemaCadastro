<?php

// Recebendo o método POST
$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$data_nascimento = date("Y-m-d", strtotime(str_replace("/", "-", $_POST["data_nascimento"])));
$telefone = $_POST["telefone"];
$celular = $_POST["celular"];
$status = $_POST["status"];

// Inserindo no banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

$sql = $pdo->prepare("INSERT INTO cliente (nome, email, cpf, data_nascimento, telefone, celular, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
$sql->execute([$nome, $email, $cpf, $data_nascimento, $telefone, $celular, $status]);

header("Location: ../clientes/action_cliente.php");
exit;
