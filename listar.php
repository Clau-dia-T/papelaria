<?= 
    require_once("importacoes.php");
    $coluna = "";
    $ordem = "";
    
    $form = isset($_GET["coluna"]) && isset($_GET["ordem"]);
    
    if($form){
        $coluna = $_GET["coluna"];
        $ordem = $_GET["ordem"];
        $resultados = selectSQL("SELECT * FROM produtos ORDER BY $coluna $ordem");
    }
    else{
        $resultados = selectSQL("SELECT * FROM produtos");
    }
?>

<?php require("componentes/header_2.php");?>


<main class="caixa">
    <h3>Ordem da Lista</h3>
    <form action="">
        <label class="labelespecial" for="coluna">Coluna</label>
        <select name="coluna" id="coluna">
            <option <?= ($coluna == "id") ? "selected" : ""; ?> value="id">ID</option>
            <option <?= ($coluna == "nome") ? "selected" : ""; ?> value="nome">Nome</option>
            <option <?= ($coluna == "preco") ? "selected" : ""; ?> value="preco">Preço</option>
            <option <?= ($coluna == "quantidade") ? "selected" : ""; ?> value="quantidade">Quantidade</option>
        </select>
        <br><br>
        <div>
            <label class="labelespecial espacamento_01" for="ordem">Ascendente</label>
            <label class="labelespecial espacamento_01" for="ordem">Descendente</label>
            <br>
            <input type="radio" class="espacamento_02" name="ordem" value="ASC" <?= ($ordem == "ASC") ? "checked" : ""; ?>>
            <input type="radio" class="espacamento_02" name="ordem" value="DESC" <?= ($ordem == "DESC") ? "checked" : ""; ?>>
        </div>
        <br>
        <input type="submit" value="Listar">
    </form>
    <?php require("componentes/tabela_auto.php"); ?>
</main>

<?php require("componentes/footer.php"); ?>