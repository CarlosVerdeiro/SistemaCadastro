<?php
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['search'])) ? $_GET['search'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)) {
    // Execute uma consulta completa
    $conexao = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

    $sql = 'SELECT id, nome, cpf, email, telefone, celular, data_nascimento, status, data_cadastro, data_alteracao FROM cliente';

    $stm = $conexao->prepare($sql);
    $stm->execute();
    $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
} else {
    // Executa uma consulta baseada no termo de pesquisa passado como parâmetro
    $conexao = new PDO('mysql:host=localhost;dbname=banco', 'root', '');

    $sql = 'SELECT id, nome, cpf, email, telefone, celular, data_nascimento, status, data_cadastro, data_alteracao FROM cliente WHERE nome LIKE :nome OR email LIKE :email';
    $stm = $conexao->prepare($sql);
    $stm->bindValue(':nome', '%' . $termo . '%');
    $stm->bindValue(':email', '%' . $termo . '%');
    $stm->execute();
    $clientes = $stm->fetchAll(PDO::FETCH_OBJ);
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
    <title>Ação Clientes</title>
</head>

<body id="action">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../menu.php" style="font-size: 30px;">CLIENTES</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php include('../templates/nav.php') ?>
            </div>
        </nav>
    </header>
    <form class="d-flex w-50" role="search" method="GET">
                <input class="form-control me-2" type="search" placeholder="Consulta" aria-label="Search" name="search">
                <button class="btn btn-outline-success" type="submit">Consultar</button>
    </form>
    <div class="table-responsive" style="width: 100%;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Status</th>
                    <th scope="col">Data de Cadastro</th>
                    <th scope="col">Data de Alteração</th>
                    <th scope="col">Edição</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                foreach ($clientes as $cliente) {
                    // Formatar data de nascimento
                    $dataNascimentoFormatada = date("d/m/Y", strtotime($cliente->data_nascimento));

                    // Formatar data de cadastro
                    $dataCadastroFormatada = ($cliente->data_cadastro !== "0000-00-00 00:00:00") ? date("d/m/Y H:i:s", strtotime($cliente->data_cadastro)) : "Nenhum Registro";

                    // Formatar data de alteração
                    $dataAlteracaoFormatada = ($cliente->data_alteracao !== "0000-00-00 00:00:00") ? date("d/m/Y H:i:s", strtotime($cliente->data_alteracao)) : "Nenhum Registro";

                    echo '
                    <tr>
                        <th scope="row">' . $cliente->id . '</th>
                        <td>' . $cliente->nome . '</td>
                        <td>' . $cliente->cpf . '</td>
                        <td>' . $cliente->email . '</td>
                        <td>' . $cliente->telefone . '</td>
                        <td>' . $cliente->celular . '</td>
                        <td>' . $dataNascimentoFormatada . '</td>
                        <td>' . $cliente->status . '</td>
                        <td>' . $dataCadastroFormatada . '</td>
                        <td>' . $dataAlteracaoFormatada . '</td>
                        <td>
                            <form action="../clientes/edicao_cliente.php" method="post">
                                <input type="hidden" name="oculto" value="' . $cliente->id . '">
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
