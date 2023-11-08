<?php

require_once("importacoes.php");

$form = isset($_GET["nome"]) && isset($_GET["preco"]) && isset($_GET["quantidade"]);

if($form){
    $nome = $_GET["nome"];
    $preco = $_GET["preco"];
    $quantidade = $_GET["quantidade"];

    iduSQL("INSERT INTO produtos (nome, preco, quantidade) VALUES ('$nome', '$preco', '$quantidade')");
}

require("componentes/header_2.php");
?>

<main class="caixa">
    <?php if(!$form):?>
    <h3>Registar</h3>
    <form action="">
        <input type="text" name="nome" placeholder="Nome" autofocus required="required">
        <br><br>
        <input type="text" name="preco" placeholder="Preço" required="required">
        <br><br>
        <input type="text" name="quantidade" placeholder="Quantidade" required="required">
        <br><br>
        <input type="submit" value="Registar">
    </form>
    <?php else:?>
        <h3>Produto Registado com Sucesso!</h3>
        <a href="registar.php"><button>Registar mais</button></a>
    <?php endif;?>
</main>


<?php require("componentes/footer.php"); ?>