<?php

require_once("importacoes.php");

$form = isset($_GET["pesquisa"]);

if($form){
    $pesquisa = $_GET["pesquisa"];
    $resultados = selectSQL("SELECT * FROM produtos WHERE nome LIKE '%$pesquisa%'");
}

require("componentes/header_2.php");
?>

<main class="caixa">
    <h3>Pesquisar</h3>
    <form action="">
        <input type="text" name="pesquisa" placeholder="Pesquisar" autofocus required="required">
        <br><br>
        <input type="submit" value="Pesquisar">
    </form>

    <?php if($form): ?>
        <br>
        <a href="pesquisar.php"><button>Reset</button></a>
        <br><br>
        <?php require("componentes/tabela_auto.php"); ?>
    <?php endif; ?>
</main>


<?php require("componentes/footer.php"); ?>