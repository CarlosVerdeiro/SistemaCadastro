<?php

// Recebendo o método POST
    $id = $_POST["id_oculto"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $cnpj = $_POST["cnpj"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $endereco = $_POST["endereco"];
    $status = $_POST["status"];
    date_default_timezone_set('America/Sao_Paulo');
    $data_alteracao = date("Y-m-d H:i:s");

    // Inserindo no banco de dados
    $pdo = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

    $sql = $pdo->prepare("UPDATE fornecedores SET nome = :nome, telefone = :telefone, email = :email, cnpj = :cnpj, cidade = :cidade, estado = :estado, endereco = :endereco, status = :status, data_alteracao = :data_alteracao WHERE id = :id");

    $sql->bindParam(':nome', $nome);
    $sql->bindParam(':telefone', $telefone);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':cnpj', $cnpj);
    $sql->bindParam(':cidade', $cidade);
    $sql->bindParam(':estado', $estado);
    $sql->bindParam(':endereco', $endereco);
    $sql->bindParam(':status', $status);
    $sql->bindParam(':data_alteracao', $data_alteracao);
    $sql->bindParam(':id', $id);

    $sql->execute();

    header("Location: ../fornecedores/action_fornecedor.php");
    exit;