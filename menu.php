<?php
session_start(); // Inicie a sessão, se ainda não estiver iniciada

$nome = 'Usuário';

// Verifique se o usuário está logado (verifique se a variável de sessão 'user_id' existe)
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];

    // Agora você pode usar o $id da sessão para buscar o nome do usuário no banco de dados
    try {
        $conexao = new PDO('mysql:host=localhost;dbname=banco', 'root', '');
        $sql = "SELECT nome FROM usuario WHERE id = :id";
        $stm = $conexao->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $nome = $result["nome"];
        }
    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    }
} else {
    session_destroy(); // Encerra a sessão
    header('Location: index.php'); // Redirecione para a página de login, por exemplo.
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <title> Cadastro</title>
</head>

<body style="background-image: url('https://i.pinimg.com/originals/ab/dc/59/abdc59c933a70920864a605b2f4bff1c.png'); background-repeat: no-repeat; background-position: center; background-position-y: center; background-attachment:fixed;">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="font-size: 30px;">MENU CADASTRO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php include('./templates/nav.php') ?>
                <section id="sectionPrincipal">
                    <li class="nav-item dropdown" id="liMenu">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="centralTotal linha "><img src="\imagens\user.png" alt="user" id="imgUser"></div>
                            <?php 
                                echo $nome;
                            ?>
                        </a>
                        <ul class="dropdown-menu alert-danger dropdown-menu-end" id="desconectar">
                            <li><a class="dropdown-item alert-danger " href="index.php">Desconectar</a></li>
                        </ul>
                    </li>
                </section>
            </div>


        </nav>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>