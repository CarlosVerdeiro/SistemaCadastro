<?php

// Recebendo o método POST
$id = $_POST["id_oculto"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$data_nascimento = date("Y-m-d", strtotime(str_replace("/", "-", $_POST["data_nascimento"])));
$telefone = $_POST["telefone"];
$celular = $_POST["celular"];
$status = $_POST["status"];
date_default_timezone_set('America/Sao_Paulo');
$data_alteracao = date("Y-m-d H:i:s");

// Inserindo no banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

$sql = $pdo->prepare("UPDATE cliente SET nome = :nome, email = :email, cpf = :cpf, data_nascimento = :data_nascimento, telefone = :telefone, celular = :celular, status = :status, data_alteracao = :alteracao WHERE id = :id");

$sql->bindParam(':nome', $nome);
$sql->bindParam(':email', $email);
$sql->bindParam(':cpf', $cpf);
$sql->bindParam(':data_nascimento', $data_nascimento);
$sql->bindParam(':telefone', $telefone);
$sql->bindParam(':celular', $celular);
$sql->bindParam(':status', $status);
$sql->bindParam(':alteracao', $data_alteracao);
$sql->bindParam(':id', $id);

$sql->execute();

header("Location: ../clientes/action_cliente.php");
exit;