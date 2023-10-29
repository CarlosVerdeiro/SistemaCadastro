# Projeto de Sistema Web 1 - Cadastro de Clientes e Fornecedores

Este projeto foi desenvolvido como parte da disciplina de Sistema Web 1 com o objetivo de criar um sistema de cadastro de clientes e fornecedores. O projeto inclui funcionalidades de cadastro, exclusão e consulta de registros. As tecnologias web, como PHP, MySQL e JavaScript, são utilizadas para implementar o sistema.

## Visão Geral

Este projeto educativo é continuado por Carlos Daniel Verdeiro e baseado no projeto do professor Reginaldo Calegari Tiziano, com orientação do professor Alexon Allan Da Silva.

## Funcionalidades

O projeto inclui as seguintes funcionalidades essenciais para um sistema de cadastro:

- Cadastro de Clientes
- Cadastro de Fornecedores
- Exclusão de Registros
- Consulta de Registros

## Tecnologias Utilizadas

As principais tecnologias e linguagens utilizadas neste projeto são:

- PHP
- MySQL
- JavaScript
- HTML
- CSS
- Bootstrap (opcional)

## Estrutura de Diretórios

A estrutura de diretórios do projeto está organizada da seguinte forma:

├── banco/

│ └── banco.sql

├── clientes/
│ ├── action_cliente.php
│ ├── alterar_cliente.php
│ ├── cadastro_cliente.php
│ ├── edicao_cliente.php
│ ├── excluir_cliente.php
│ └── inserir_cliente.php
├── css/
│ ├── bootstrap.min.css
│ └── custom.css
├── fornecedores/
│ ├── action_fornecedor.php
│ ├── alterar_fornecedor.php
│ ├── cadastro_fornecedor.php
│ ├── edicao_fornecedor.php
│ ├── excluir_fornecedor.php
│ └── inserir_fornecedor.php
├── js/
│ └── custom.js
├── templates/
│ └── nav.php
├── index.php
└── README.md

## Configuração

Para executar o projeto, siga estas etapas:

1. Configure um servidor web local, como o Apache.
2. Crie um banco de dados MySQL e importe o esquema do banco de dados a partir do arquivo `banco/banco.sql`.
3. Atualize as configurações de conexão com o banco de dados nos esquemas de conexão PHP.

## Uso

Para testar o projeto, inicie um servidor local e acesse o arquivo `index.php` em um navegador web.
