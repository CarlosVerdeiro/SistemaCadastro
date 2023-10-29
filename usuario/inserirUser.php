<?php

$conexao = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

function verificacao($email, $conexao)
{

    //verificação email
    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $stm = $conexao->prepare($sql);
    $stm->execute();
    if ($stm->rowCount() > 0) {
        return true;
    }else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se o email existe
    if (verificacao($email, $conexao) == true) {
        echo '<script>event.preventDefault();</script>';
        header('Location: ' . 'cadastroUsuario.php');
        die();
    } else {
        $senhaCrip = password_hash($senha, PASSWORD_DEFAULT); //Criptografia de senha

        $stm = $conexao->prepare("INSERT INTO usuario (nome,email,senha) VALUES (?,?,?);");
        $stm->execute([$nome, $email, $senhaCrip]);
        header('Location: ' . '/index.php');
    }
}

?>