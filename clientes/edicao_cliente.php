<?php
$id = $_POST["oculto"];

$pdo = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

$sql = $pdo -> prepare("SELECT * FROM Cliente WHERE id = $id");
$sql -> execute();
$registros = $sql->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Clientes</title>
</head>

<body>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="./action_cliente.php" style="font-size: 30px;">EDIÇÃO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php include('../templates/nav.php') ?>
            </div>
        </nav>
    </header>
    <section class="container">
        
        <fieldset>
            <form action="../clientes/alterar_cliente.php" method="post" id='form-contato'
                enctype='multipart/form-data'>
                <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id"  value="<?php echo $registros['id']; ?>" disabled>
                    <input type="hidden" name="id_oculto" value="<?php echo $registros['id']; ?>">
                </div>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Infome o Nome" value="<?php echo $registros['nome']; ?>">
                    <span class='msg-erro msg-nome'></span>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Informe o E-mail" value="<?php echo $registros['email']; ?>">
                    <span class='msg-erro msg-email'></span>
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="cpf" class="form-control" id="cpf" maxlength="14" name="cpf" placeholder="Informe o CPF" value="<?php echo $registros['cpf']; ?>">
                    <span class='msg-erro msg-cpf'></span>
                </div>
                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="data_nascimento" class="form-control" id="data_nascimento" maxlength="10" name="data_nascimento" value="<?php echo $registros['data_nascimento']; ?>">
                    <span class='msg-erro msg-data'></span>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" placeholder="Informe o Telefone" value="<?php echo $registros['telefone']; ?>">
                    <span class='msg-erro msg-telefone'></span>
                </div>
                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="celular" class="form-control" id="celular" maxlength="13" name="celular" placeholder="Informe o Celular" value="<?php echo $registros['celular']; ?>">
                    <span class='msg-erro msg-celular'></span>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="">Selecione o Status</option>
                        <option value="Ativo" <?php echo ($registros['status'] === 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
                        <option value="Inativo" <?php echo ($registros['status'] === 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
                    </select>

                    <span class='msg-erro msg-status'></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="hidden" name="acao" value="incluir">
                        <button type="submit" class="btn btn-success " id='botao'>
                            Confirmar
                        </button>
                        <button class="btn btn-danger" id='exluir' type='button' onclick="redirecionar()">
                            Excluir
                        </button>
                    </div>
                    <div class="col">
                        <div class="form-group col">
                        <label for="cadastro">Data de Cadastro</label>
                        <input type="text" class="form-control" id="cadastro" name="data_cadastro" disabled value="<?php echo ($registros['data_cadastro'] !== "0000-00-00 00:00:00") ? date("d/m/Y H:i:s", strtotime($registros["data_cadastro"])) : "Nenhuma Alteração"; ?>">
                        </div>
                        
                    </div>
                    <div class="col">
                        <div class="form-group col">
                        <label for="alteracao">Última Alteração</label>
                        <input type="text" class="form-control" id="data_alteracao" name="data_alteracao" disabled  value="<?php echo ($registros['data_alteracao'] !== "0000-00-00 00:00:00") ? date("d/m/Y H:i:s", strtotime($registros["data_alteracao"])) : "Nenhuma Alteração"; ?>">
                        </div>
                    </div>
                </div>
            </form>
                
        </fieldset>
    </section>

    <script>
    function redirecionar() {
        window.location.href = 'excluir_cliente.php?id=<?php echo $id; ?>';
    }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="../js/custom.js"></script>
</body>

</html>