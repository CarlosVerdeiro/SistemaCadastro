<?php
session_start(); // Inicie a sessão, se ainda não estiver iniciada

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha)) {
        try {
            $conexao = new PDO('mysql:host=localhost;dbname=banco', 'root', '', array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
            
            $sql = "SELECT senha, id FROM usuario WHERE email = :email";
            $stm = $conexao->prepare($sql);
            $stm->bindParam(':email', $email, PDO::PARAM_STR);
            $stm->execute();

            $result = $stm->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $senhaDB = $result['senha'];
                $id = $result['id'];

                if (password_verify($senha, $senhaDB)) {
                    $_SESSION['user_id'] = $id; // Armazene o ID do usuário na variável de sessão
                    header('Location: menu.php'); // Redirecione para a página de menu após o login
                    exit();
                } else {
                    echo "<script>
                    alert('Senha incorreta.');
                    </script>";
                }
            } else {
                echo "<script>
                alert('Email não encontrado.');
                </script>";
            }
        } catch (PDOException $e) {
            echo "Erro de conexão com o banco de dados: " . $e->getMessage();
        }
    }
}
?>




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
                <section class="row">

                    <form class="row" method="post" id="Formulario">
                        <div class="mb-3 col">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            <span class="invalid-feedback msg-email"></span>
                        </div>
                        <div class="mb-3 col">
                            <label for="exampleInputPassword1" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                            <span class="invalid-feedback msg-senha"></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" class="btn btn-primary" id="submit">Log In</button>
                        <div class="mb-3 row"><a href="\usuario\cadastroUsuario.php">Fazer cadastro AQUI</a></div>
                    </form>
                </section>
            </div>
        </nav>
    </header>
    <script src="/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>