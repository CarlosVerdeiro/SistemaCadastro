<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/custom.css">
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="\index.php" style="font-size: 30px;">LOGIN CADASTRO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>
    <section class="container">
        <fieldset>
            <form action="inserirUser.php" method="post" id='form-user' enctype='multipart/form-data'>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Infome o Nome">
                    <span class='msg-erro msg-nome'></span>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Informe o E-mail">
                    <span class='msg-erro msg-email'></span>
                </div>
                
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" maxlength="20" name="senha" placeholder="Crie uma senha">
                    <span class='msg-erro msg-senha'></span>
                </div>
                <div class="form-group">
                    <label for="conSenha">Comfirme a senha</label>
                    <input type="password" class="form-control" id="comSenha" maxlength="20" name="comSenha" placeholder="Confirme a senha">
                    <span class='msg-erro msg-comSenha'></span>
                </div>
                <button type="submit" class="btn btn-success" id='botao'>
                    Confirmar
                </button>
        </fieldset>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../js/cadastroUsuario.js"></script>
</body>
</html>