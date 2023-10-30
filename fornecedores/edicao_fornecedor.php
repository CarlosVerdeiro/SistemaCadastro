<?php
$id = $_POST["oculto"];

$pdo = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

$sql = $pdo -> prepare("SELECT * FROM Fornecedores WHERE id = $id");
$sql -> execute();
$registros = $sql->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Fornecedores</title>
</head>

<body>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="./action_fornecedor.php" style="font-size: 30px;">EDIÇÃO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php include('../templates/nav.php') ?>
            </div>
        </nav>
    </header>
    <section class="container">
        
        <fieldset>
            <form action="../fornecedores/alterar_fornecedor.php" method="post" id='form-contato'
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
                    <label for="telefone">Telefone</label>
                    <input type="telefone" class="form-control" id="telefone" maxlength="20" name="telefone" placeholder="Informe o Telefone" value="<?php echo $registros['telefone']; ?>">
                    <span class='msg-erro msg-telefone'></span>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" maxlength="100" name="email" placeholder="Informe o E-mail" value="<?php echo $registros['email']; ?>">
                    <span class='msg-erro msg-email'></span>
                </div>
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="cnpj" class="form-control" id="cnpj" maxlength="30" name="cnpj" placeholder="Informe o cnpj" value="<?php echo $registros['cnpj']; ?>">
                    <span class='msg-erro msg-cnpj'></span>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="cidade" class="form-control" id="cidade" maxlength="25" name="cidade" value="<?php echo $registros['cidade']; ?>">
                    <span class='msg-erro msg-data'></span>
                </div>
                
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="estado" class="form-control" id="estado" maxlength="2" name="estado" placeholder="Informe o estado" value="<?php echo $registros['estado']; ?>">
                    <span class='msg-erro msg-estado'></span>
                </div>
                <div class="form-group">
                    <label for="estado">Endereço</label>
                    <input type="endereco" class="form-control" id="endereco" maxlength="100" name="endereco" placeholder="Informe o endereco" value="<?php echo $registros['endereco']; ?>">
                    <span class='msg-erro msg-endereco'></span>
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
        window.location.href = 'excluir_fornecedor.php?id=<?php echo $id; ?>';
    }
</script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html>