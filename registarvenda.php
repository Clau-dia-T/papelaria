<?php 

require_once("importacoes.php");

$form = isset($_GET["vender"]);
$form_02 = isset($_GET["totalvenda"]);


if($form){
    $id = $_GET["vender"];
    $produto = selectSQLUnico("SELECT * FROM produtos WHERE id='$id'");
    $quantidade_prevenda = intval($produto["quantidade"]);
    if($form_02){
        $totalvenda = intval($_GET["totalvenda"]);
        $quantidade_posvenda = $quantidade_prevenda - $totalvenda;
        if($quantidade_posvenda >= 0){
            iduSQL("UPDATE produtos SET quantidade='$quantidade_posvenda' WHERE id='$id'");
        }
    }
}

$resultados = selectSQL("SELECT * FROM produtos");

require("componentes/header_2.php"); 
?>

<main class="caixa">
    <?php if($form && !$form_02): ?>
        <h3>Vender</h3>
        <br>
        <form action="">
            <?php $chaves = array_keys($resultados[0]); ?>
            <table>
                <tr>
                    <?php foreach($chaves as $c): ?>
                        <th><?= $c; ?></th>
                    <?php endforeach; ?>
                    <th>Quantidade a vender</th>
                </tr>
                <tr>
                    <?php foreach($chaves as $c): ?>
                        <td><?= $produto[$c]; ?></td>
                    <?php endforeach; ?>
                    <td>
                        <input type="hidden" name="vender" value="<?= $id; ?>">
                        <input type="number" name="totalvenda" placeholder="Total" min="0" step="1" required="required" autofocus>
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Vender">
        </form>

    <?php elseif($form_02): ?>
        <?php if($quantidade_posvenda >= 0): ?>
            <h3>Venda Efectuada com Sucesso!</h3>
            <a href="registarvenda.php"><button>Voltar</button></a>  
        <?php else: ?>  
            <h4>Quantidade de venda superior ao stock, tente novamente.</h4>
            <a href="registarvenda.php"><button>Voltar</button></a> 
        <?php endif; ?>
    <?php else: ?>
    <h3>Registo de Saidas</h3>
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
                            <button name="vender" value="<?= $r["id"] ?>">Vender</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</main>

<?php require("componentes/footer.php"); ?>