<?php if(!empty($resultados)): ?>

<?php $chaves = array_keys($resultados[0]); ?>

    <table>
        <tr>
            <?php foreach($chaves as $c): ?>
                <th><?= $c; ?></th>
            <?php endforeach; ?>
        </tr>
        <?php foreach($resultados as $r): ?>

            <tr>
                <?php foreach($chaves as $c): ?>
                    <td><?= $r[$c]; ?></td>
                <?php endforeach; ?>
            </tr>

        <?php endforeach; ?>
    </table>

<?php endif; ?>