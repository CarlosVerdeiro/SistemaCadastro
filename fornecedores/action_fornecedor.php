<?php
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['search'])) ? $_GET['search'] : '';

// Cria a conexão com o banco de dados
$conexao = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

// Inicializa a variável de consulta SQL
$sql = 'SELECT id, nome, telefone, email, cnpj, cidade, estado, endereco, status, data_cadastro, data_alteracao FROM fornecedores';

// Se o termo de pesquisa não estiver vazio, filtre os resultados
if (!empty($termo)) {
    $sql .= ' WHERE nome LIKE :nome OR email LIKE :email';
}

// Prepara a consulta SQL
$stm = $conexao->prepare($sql);

// Se o termo de pesquisa não estiver vazio, associe os parâmetros
if (!empty($termo)) {
    $stm->bindValue(':nome', '%' . $termo . '%');
    $stm->bindValue(':email', '%' . $termo . '%');
}

// Executa a consulta SQL
$stm->execute();

// Obtém os resultados da consulta
$fornecedores = $stm->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/custom.css">
    <title>Ação Fornecedores</title>
</head>

<body id="action">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../menu.php" style="font-size: 30px;">FORNECEDORES</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php include('../templates/nav.php') ?>
            </div>
        </nav>
    </header>
    <form class="d-flex w-50" role="search" method="GET">
        <input class="form-control me-2" type="search" placeholder="Consulta" aria-label="Search" name="search" value="<?php echo $termo; ?>">
        <button class="btn btn-outline-success" type="submit">Consultar</button>
    </form>
    <div class="table-responsive" style="width: 100%;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data de Cadastro</th>
                    <th scope="col">Data de Alteração</th>
                    <th scope="col">Edição</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                foreach ($fornecedores as $fornecedor) {
                    // Formatar data de cadastro
                    $dataCadastroFormatada = ($fornecedor->data_cadastro !== "0000-00-00 00:00:00") ? date("d/m/Y H:i:s", strtotime($fornecedor->data_cadastro)) : "Nenhum Registro";

                    // Formatar data de alteração
                    $dataAlteracaoFormatada = ($fornecedor->data_alteracao !== "0000-00-00 00:00:00") ? date("d/m/Y H:i:s", strtotime($fornecedor->data_alteracao)) : "Nenhum Registro";

                    echo '
                    <tr>
                        <th scope="row">' . $fornecedor->id . '</th>
                        <td>' . $fornecedor->nome . '</td>
                        <td>' . $fornecedor->telefone . '</td>
                        <td>' . $fornecedor->email . '</td>
                        <td>' . $fornecedor->cnpj . '</td>
                        <td>' . $fornecedor->cidade . '</td>
                        <td>' . $fornecedor->estado . '</td>
                        <td>' . $fornecedor->endereco . '</td>
                        <td>' . $fornecedor->status . '</td>
                        <td>' . $dataCadastroFormatada . '</td>
                        <td>' . $dataAlteracaoFormatada . '</td>
                        <td>
                            <form action="../fornecedores/edicao_fornecedor.php" method="post">
                                <input type="hidden" name="oculto" value="' . $fornecedor->id . '">
                                <button type="submit" class="btn btn-outline-primary" type="submit">Editar</button>
                            </form>
                        </td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
