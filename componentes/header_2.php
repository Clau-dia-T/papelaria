<?php 
    require_once("importacoes.php");
    verificarLogadoRedirecionar();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papelaria 2023</title>
    <!-- CSS LOCAL -->
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <header class="caixa">
        <h1>Sistema da Papelaria 2023</h1>

        <nav>
            <a href="home.php">Home</a>
            <a href="listar.php">Listar Produtos</a>
            <a href="pesquisar.php">Pesquisar Produto</a>
            <a href="registar.php">Registar Produto</a>
            <a href="editar.php">Editar Produto</a>
            <a href="eliminar.php">Eliminar Produto</a>
            <a href="registarvenda.php">Registar Venda</a>
            <a href="sair.php">Sair</a>
        </nav>
    </header>