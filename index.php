<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <title>Login</title>
</head>

<body style="background-image: url('https://i.pinimg.com/originals/ab/dc/59/abdc59c933a70920864a605b2f4bff1c.png'); background-repeat: no-repeat; background-position: center; background-position-y: center; background-attachment:fixed;">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style="font-size: 30px;">LOGIN</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php include('./templates/navLogin.php') ?>
            </div>
        </nav>
    </header>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if ($email != '' && $senha != '') {
            $conexao = new PDO('mysql:host=localhost;dbname=banco', 'root', '');
            $sql = "SELECT senha FROM usuario WHERE email = '$email'";
            $stm = $conexao->prepare($sql);
            $stm->execute();

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            $senhaDes = false;

            foreach ($result as $row) {
                $senhaDes = password_verify($senha, $row['senha']);
            }

            if ($senhaDes) {
                $sql = "SELECT id FROM usuario WHERE email = '$email'";
                $stm = $conexao->prepare($sql);
                $stm->execute();

                $result = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                    $id = $row['id'];
                }

                echo '<form id="myForm" method="post" action="menu.php">';
                echo '<input type="hidden" name="id" value="', $id, '">';
                echo '<input type="submit" value="Enviar" id="sub">';
                echo '<script>';
                echo 'document.getElementById("myForm").submit();'; // Enviar o formulário automaticamente
                echo '</script>';
                echo '</form>';
            } else {
                echo "<script>alert('Senha incorreta.')</script>";
            }
        }
    }
    ?>
    <script src="/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>