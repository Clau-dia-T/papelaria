<?php

require_once("importacoes.php");

$form = isset($_GET["editar"]);
$form_02 = isset($_GET["nome"]) && isset($_GET["preco"]) && isset($_GET["quantidade"]);


if($form){
    $id = $_GET["editar"];
    $produto = selectSQLUnico("SELECT * FROM produtos WHERE id='$id'");
    if($form_02){
        $nome = $_GET["nome"];
        $preco = $_GET["preco"];
        $quantidade = $_GET["quantidade"];
        iduSQL("UPDATE produtos SET nome='$nome', preco='$preco', quantidade='$quantidade' WHERE id='$id'");
    }
}

$resultados = selectSQL("SELECT * FROM produtos");

require("componentes/header_2.php");
?>

<main class="caixa">
    <?php if($form && !$form_02): ?>
        <h3>Editar Produto (<?=$id;?>)</h3>
        <br>
        <form action="">
            <input type="hidden" name="editar" value="<?= $id; ?>">
            <input type="text" name="nome" value="<?=$produto["nome"];?>" required="required">
            <br><br>
            <input type="number" name="preco" min="0.01" step="0.01" value="<?=$produto["preco"];?>" required="required">
            <br><br>
            <input type="number" name="quantidade" min="0" step="1" value="<?=$produto["quantidade"];?>" required="required">
            <br><br>
            <input type="submit" value="Editar">
        </form>
    <?php elseif($form_02): ?>
        <h3>Produto Editado com Sucesso!</h3>
        <a href="editar.php"><button>Voltar</button></a>
    <?php else: ?>
        <h3>Editar</h3>
        <br>
        <?php $chaves = array_keys($resultados[0]); ?>

        <table>
            <tr>
                <?php foreach($chaves as $c): ?>
                    <th><?= $c; ?></th>
                <?php endforeach; ?>
                <th>Acção</th>
            </tr>
            <?php foreach($resultados as $r): ?>

                <tr>
                    <?php foreach($chaves as $c): ?>
                        <td><?= $r[$c]; ?></td>
                    <?php endforeach; ?>
                    <td>
                        <form action="">
                            <button name="editar" value="<?= $r["id"] ?>">Editar</button>
                        </form>
                    </td>
                </tr>

            <?php endforeach; ?>
        </table>

    <?php endif; ?>
    
</main>


<?php require("componentes/footer.php"); ?>