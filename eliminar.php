<?php

require_once("importacoes.php");

$form = isset($_GET["eliminar"]);
$form_02 = isset($_GET["resposta"]);

if($form){
    $id = $_GET["eliminar"];
    $produto = selectSQLUnico("SELECT * FROM produtos WHERE id='$id'");
    if($form_02){
        iduSQL("DELETE FROM produtos WHERE id='$id'");
    }
}

$resultados = selectSQL("SELECT * FROM produtos");

require("componentes/header_2.php");
?>

<main class="caixa">
    <?php if($form && !$form_02): ?>
        <h3>Tem a certeza que deseja eliminar o produto (<?=$id;?>) - (<?=$produto["nome"];?>)?</h3>
        <br>
        <div class="botoeseliminar">
            <form action="">
                <input type="hidden" name="eliminar" value="<?= $id; ?>">
                <button name="resposta" value="true">Sim</button>
            </form>
            <a href="eliminar.php"><button>Não</button></a>
        </div>
    <?php elseif($form_02): ?>
        <h3>Produto (<?=$id;?>) eliminado com Sucesso!</h3>
        <a href="eliminar.php"><button>Voltar</button></a>
    <?php else: ?>
        <h3>Eliminar</h3>
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
                            <button name="eliminar" value="<?= $r["id"] ?>">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</main>


<?php require("componentes/footer.php"); ?>